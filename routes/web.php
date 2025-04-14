<?php

use App\Http\Controllers\DeskController;
use Illuminate\Support\Facades\Route;


 
Route::controller(DeskController::class)->group(function () {
    Route::prefix('desk')->group(function () {
        Route::get('/show', 'show');
    });
})->middleware(['auth', 'verified']);

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';