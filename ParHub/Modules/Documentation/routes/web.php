<?php

use Illuminate\Support\Facades\Route;
use Modules\Documentation\Livewire\DocumentUpload;
use Modules\Documentation\Http\Controllers\DocumentationController;

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Documentation upload routes
    Route::get('/documentations/create', DocumentUpload::class)->name('documentation.create');
    
    // Other documentation routes
    Route::get('/documentations', [DocumentationController::class, 'index'])->name('documentation.index');
    Route::get('/documentations/{document}', [DocumentationController::class, 'show'])->name('documentation.show');
    Route::delete('/documentations/{document}', [DocumentationController::class, 'destroy'])->name('documentation.destroy');
});
