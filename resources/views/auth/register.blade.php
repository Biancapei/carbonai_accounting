<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Create your free account</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Auth CSS -->
    <link rel="stylesheet" href="{{ (request()->secure() || app()->environment('production')) ? secure_asset('css/auth.css') : asset('css/auth.css') }}">
</head>
<body class="auth-body auth-register">
    <div class="auth-container">
        <div class="logo">CarbonAI</div>

        <h1 class="auth-title mt-2">Create your free account</h1>
        <p class="auth-subtitle">100% free. No credit card needed.</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Social Login Buttons -->
        <a href="{{ route('auth.google') }}" class="social-btn">
            <i class="google-icon"></i>
            Continue with Google
        </a>

        <a href="{{ route('auth.microsoft') }}" class="social-btn">
            <i class="microsoft-icon"></i>
            Sign up with Microsoft
        </a>

        <!-- Divider -->
        <div class="divider">
            <span>OR</span>
        </div>

        <!-- Email Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Full name</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="e.g. Alex Morgan"
                       required
                       autocomplete="name">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email address</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="name@company.com"
                       required
                       autocomplete="email">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password"
                       name="password"
                       placeholder="At least 8 characters"
                       required
                       autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password"
                       class="form-control"
                       id="password_confirmation"
                       name="password_confirmation"
                       placeholder="Re-enter your password"
                       required
                       autocomplete="new-password">
            </div>

            <div class="privacy-checkbox-group mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="privacy_agreement" id="privacy_agreement" required>
                    <label class="form-check-label privacy-text" for="privacy_agreement">
                        By creating an account you agree to our
                        <a href="#" target="_blank">Privacy Policy</a> and
                        acknowledge that we may send onboarding emails.
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-register w-100" id="submitBtn" disabled>
                Create account
            </button>
        </form>

        <div class="login-link mt-4">
            Have an account? <a href="{{ route('login') }}">Sign in</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Disable submit button until privacy checkbox is checked
        document.addEventListener('DOMContentLoaded', function() {
            const privacyCheckbox = document.getElementById('privacy_agreement');
            const submitBtn = document.getElementById('submitBtn');

            if (privacyCheckbox && submitBtn) {
                // Check initial state
                updateSubmitButton();

                // Listen for checkbox changes
                privacyCheckbox.addEventListener('change', function() {
                    updateSubmitButton();
                });

                function updateSubmitButton() {
                    if (privacyCheckbox.checked) {
                        submitBtn.disabled = false;
                        submitBtn.style.opacity = '1';
                        submitBtn.style.cursor = 'pointer';
                    } else {
                        submitBtn.disabled = true;
                        submitBtn.style.opacity = '0.6';
                        submitBtn.style.cursor = 'not-allowed';
                    }
                }
            }
        });
    </script>
</body>
</html>
