<?php

use Illuminate\Support\Facades\Route;
use Modules\LandingPage\Livewire\WelcomePage;

// Make the landing page the root route (accessible to everyone)
Route::get('/', WelcomePage::class)->name('home');

// Landing page specific routes
Route::prefix('landingpage')->name('landingpage.')->group(function () {
    Route::get('/', WelcomePage::class)->name('index');
});
