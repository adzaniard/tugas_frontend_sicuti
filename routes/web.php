<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KajurController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::resource('user', UserController::class);
Route::resource('kajur', KajurController::class);
