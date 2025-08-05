<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Don't override the root route - let the LandingPage module handle it
// But ensure authenticated users go to dashboard

// Temporary route for testing - login a user automatically
Route::get('/test-login', function() {
    $user = \App\Models\User::first();
    \Auth::login($user);
    return redirect()->route('dashboard');
})->name('test.login');

// Simple test route to check if login works
Route::get('/quick-login', function() {
    if (Auth::attempt(['email' => 'dfsdrge@gmail.com', 'password' => 'password'])) {
        return redirect()->route('dashboard')->with('success', 'Login successful!');
    } else {
        return back()->with('error', 'Login failed!');
    }
})->name('quick.login');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    
    // Presentation Management Routes
    Route::get('/presentations', function() {
        return view('presentations.index');
    })->name('presentations.index');
    
    Route::get('/presentations/create', function() {
        return view('presentations.create');
    })->name('presentations.create');
    
    // Templates Routes
    Route::get('/templates', function() {
        return view('templates.index');
    })->name('templates.index');
    
    // Analytics Routes
    Route::get('/analytics', function() {
        return view('analytics.index');
    })->name('analytics.index');
    
    // Media Library Routes
    Route::get('/media', function() {
        return view('media.index');
    })->name('media.index');
    
    // Shared Files Routes
    Route::get('/shared', function() {
        return view('shared.index');
    })->name('shared.index');
    
    // Trash Routes
    Route::get('/trash', function() {
        return view('trash.index');
    })->name('trash.index');
    
    // AI Assistant Routes
    Route::get('/ai-assistant', function() {
        return view('ai-assistant.index');
    })->name('ai-assistant.index');
    
    // Import/Export Routes
    Route::get('/import-export', function() {
        return view('import-export.index');
    })->name('import-export.index');
    
    // Help & Support Routes
    Route::get('/help', function() {
        return view('help.index');
    })->name('help.index');
    
    // Profile Routes
    Route::get('/profile', function() {
        return view('profile.index');
    })->name('profile.index');
    
    // Billing Routes
    Route::get('/billing', function() {
        return view('billing.index');
    })->name('billing.index');
    
    // Storage Upgrade Routes
    Route::get('/upgrade', function() {
        return view('upgrade.index');
    })->name('upgrade.index');
});

require __DIR__.'/auth.php';
