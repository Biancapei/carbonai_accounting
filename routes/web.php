<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/password/forgot', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/password/forgot', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::get('/auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialController::class, 'handleGoogleCallback']);

Route::get('/auth/microsoft', function () {
    return redirect()->route('login')->with('error', 'Microsoft authentication is not configured yet.');
})->name('auth.microsoft');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/scope1', function () {
        return view('scope1');
    });

    Route::get('/scope2', function () {
        return view('scope2');
    });
});
