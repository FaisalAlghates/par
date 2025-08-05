<?php

use Illuminate\Support\Facades\Route;
use Modules\Presentation\Http\Controllers\PresentationController;

Route::group([], function () {
    Route::get('presentations/{document}', [PresentationController::class, 'show'])->name('presentations.show');
    Route::get('presentations/{document}/fullscreen', [PresentationController::class, 'fullscreen'])->name('presentations.fullscreen');
    Route::get('presentations/{document}/export', [PresentationController::class, 'export'])->name('presentations.export');
});
