<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Livewire\Auth\ConfirmPassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('quick-login-direct', [LoginController::class, 'quickLogin'])->name('quick.login.direct');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');
    Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', VerifyEmail::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::get('confirm-password', ConfirmPassword::class)
        ->name('password.confirm');

    Route::post('logout', function() {
        try {
            \Log::info('Logout attempt by user: ' . (auth()->id() ?? 'guest'));
            
            // Clear session data first
            request()->session()->flush();
            request()->session()->regenerate();
            
            // Then logout
            \Auth::logout();
            
            \Log::info('Logout successful, redirecting to home');
            
            // Force redirect with immediate response
            return response()->redirectTo('/')->with('success', 'You have been logged out successfully.');
            
        } catch (\Exception $e) {
            \Log::error('Logout error: ' . $e->getMessage());
            
            // Force logout even if there's an error
            \Auth::logout();
            request()->session()->flush();
            
            return response()->redirectTo('/');
        }
    })->name('logout');

    // Quick logout route - no delays
    Route::get('quick-logout', function() {
        \Auth::logout();
        request()->session()->flush();
        return redirect('/')->with('success', 'Quick logout successful');
    })->name('quick.logout');
});
