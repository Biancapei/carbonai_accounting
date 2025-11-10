<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Reset Password</title>

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
<body class="auth-body auth-login">
    <div class="auth-container">
        <div class="logo">CarbonAI</div>

        <h1 class="auth-title mt-2">Reset your password</h1>
        <p class="auth-subtitle">We’ll send a link to the email you registered with.</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email address</label>
                <input id="email"
                       type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="name@company.com"
                       required
                       autocomplete="email"
                       autofocus>
                @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-register w-100">
                Send reset link
            </button>
        </form>

        <div class="login-link mt-4">
            <a href="{{ route('login') }}">Back to sign in</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
