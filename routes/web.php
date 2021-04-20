<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::get('coin/{tipo}/{coin}', [App\Http\Controllers\apiController::class, 'apiCoin'])->name('coin');
