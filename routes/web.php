<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\DeskController;
use Illuminate\Support\Facades\Route;


 
Route::controller(DeskController::class)->group(function () {
    Route::prefix('desk')->group(function () {
        Route::get('/show', 'show')->name('show');
        Route::get('/newDesk', 'newDesk')->name('newDesk');
    });
})->middleware(['auth', 'verified']);

Route::controller(customerController::class)->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('/show', 'show')->name('customer.show');
        Route::post('/create', 'create')->name('customer.create');
        Route::get('/destroy/{id}', 'destroy')->name('customer.destroy');
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