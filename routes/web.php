<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/auth/google', function () {
    return redirect()->route('login')->with('error', 'Google authentication is not configured yet.');
})->name('auth.google');

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
