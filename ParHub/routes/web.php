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
    // Advanced Dashboard
    Route::get('/dashboard/advanced', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.advanced');
    Route::get('/dashboard/analytics', [\App\Http\Controllers\DashboardController::class, 'analytics'])->name('dashboard.analytics');
    Route::get('/dashboard/quick-stats', [\App\Http\Controllers\DashboardController::class, 'quickStats'])->name('dashboard.quickStats');
    Route::get('/api/dashboard/quick-stats', [\App\Http\Controllers\DashboardController::class, 'quickStats'])->name('api.dashboard.stats');
    
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    
    // Presentation Management Routes
    // Presentations routes
    Route::get('/presentations', [\App\Http\Controllers\PresentationController::class, 'index'])->name('presentations.index');
    Route::get('/presentations/create', [\App\Http\Controllers\PresentationController::class, 'create'])->name('presentations.create');
    Route::post('/presentations', [\App\Http\Controllers\PresentationController::class, 'store'])->name('presentations.store');
    Route::get('/presentations/{presentation}/edit', [\App\Http\Controllers\PresentationController::class, 'edit'])->name('presentations.edit');
    Route::put('/presentations/{presentation}', [\App\Http\Controllers\PresentationController::class, 'update'])->name('presentations.update');
    Route::get('/presentations/{presentation}', [\App\Http\Controllers\PresentationController::class, 'show'])->name('presentations.show');
    Route::delete('/presentations/{presentation}', [\App\Http\Controllers\PresentationController::class, 'destroy'])->name('presentations.destroy');
    
    // Templates Routes
    Route::resource('templates', \App\Http\Controllers\TemplateController::class);
    Route::get('/templates/{template}/download', [\App\Http\Controllers\TemplateController::class, 'download'])->name('templates.download');
    Route::get('/templates/{template}/preview', [\App\Http\Controllers\TemplateController::class, 'preview'])->name('templates.preview');
    
    // Categories Routes
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    
    // Search Routes
    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search.index');
    Route::get('/search/suggestions', [\App\Http\Controllers\SearchController::class, 'suggestions'])->name('search.suggestions');
    Route::get('/search/autocomplete', [\App\Http\Controllers\SearchController::class, 'autocomplete'])->name('search.autocomplete');
    
    // API Routes for AJAX requests
    Route::prefix('api')->group(function () {
        Route::get('/templates', [\App\Http\Controllers\TemplateController::class, 'apiIndex'])->name('api.templates.index');
        Route::get('/templates/{template}', [\App\Http\Controllers\TemplateController::class, 'apiShow'])->name('api.templates.show');
        Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'apiIndex'])->name('api.categories.index');
        Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'apiShow'])->name('api.categories.show');
    });
    
    Route::get('/templates', function() {
        return view('templates.index');
    })->name('templates.index');
    
    // Analytics Routes
    Route::get('/analytics', [\App\Http\Controllers\DashboardController::class, 'analytics'])->name('analytics.index');
    
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
