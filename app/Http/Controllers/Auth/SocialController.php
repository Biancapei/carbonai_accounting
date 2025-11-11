<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {
        return $this->redirectToProvider('google');
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback()
    {
        return $this->handleProviderCallback('google');
    }

    /**
     * Redirect the user to the Microsoft authentication page.
     */
    public function redirectToMicrosoft()
    {
        return $this->redirectToProvider('microsoft');
    }

    /**
     * Obtain the user information from Microsoft.
     */
    public function handleMicrosoftCallback()
    {
        return $this->handleProviderCallback('microsoft');
    }

    /**
     * Supported providers and their configuration.
     *
     * @var array<string, array<string, mixed>>
     */
    protected array $providers = [
        'google' => [
            'scopes' => [],
            'with' => ['prompt' => 'select_account'],
        ],
        'microsoft' => [
            'scopes' => ['openid', 'profile', 'email'],
            'with' => ['prompt' => 'select_account'],
        ],
    ];

    protected function redirectToProvider(string $provider)
    {
        $config = $this->providers[$provider] ?? null;

        /** @var \Laravel\Socialite\Two\AbstractProvider $driver */
        $driver = Socialite::driver($provider);

        if (! empty($config['scopes'])) {
            $driver->scopes($config['scopes']);
        }

        if (! empty($config['with'])) {
            $driver->with($config['with']);
        }

        return $driver->redirect();
    }

    protected function handleProviderCallback(string $provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Throwable $exception) {
            return redirect()->route('login')->with(
                'error',
                'Unable to sign in with ' . ucfirst($provider) . '. Please try again.'
            );
        }

        $email = $this->extractEmail($socialUser);

        if (! $email) {
            return redirect()->route('login')->with(
                'error',
                ucfirst($provider) . ' did not provide an email address.'
            );
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $socialUser->getName() ?: $socialUser->getNickname() ?: $email,
                'password' => bcrypt(Str::random(40)),
            ]
        );

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    protected function extractEmail($socialUser): ?string
    {
        return $socialUser->getEmail()
            ?? data_get($socialUser->getRaw(), 'mail')
            ?? data_get($socialUser->getRaw(), 'userPrincipalName');
    }
}

