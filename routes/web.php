<?php

use App\Http\Controllers\DashboardController;

/*NO auth routes */

Route::get('/', [DashboardController::class, 'index'])->name('welcome');

/*Auth routes */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
