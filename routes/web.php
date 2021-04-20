<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

 Route::get('coin', [App\Http\Controllers\apiController::class, 'apiCoin'])->name('coin');
 Route::get('users', [App\Http\Controllers\apiController::class, 'apiUsers'])->name('users');
 Route::get('search', [App\Http\Controllers\apiController::class, 'searchCoin'])->name('search');
