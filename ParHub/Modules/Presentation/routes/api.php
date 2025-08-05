<?php

use Illuminate\Support\Facades\Route;
use Modules\Presentation\Http\Controllers\PresentationController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('presentations', PresentationController::class)->names('presentation');
});
