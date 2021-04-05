<?php

use Illuminate\Support\Facades\Route;
use SawoLabs\Laravel\SawoController;

/*
|--------------------------------------------------------------------------
| Sawo Routes
|--------------------------------------------------------------------------
*/
Route::get('sawo/auth', [SawoController::class, 'index'])->name('sawo_auth');
Route::post('sawo/verify', [SawoController::class, 'verify'])->name('sawo_verify');
