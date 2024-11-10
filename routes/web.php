<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


//Auth
Route::get('login',  [AuthController::class, 'login'])->name('login');
Route::post('auth',  [AuthController::class, 'auth'])->name('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//register
Route::get('register',  [UserController::class, 'register'])->name('user.register');
Route::post('register',  [UserController::class, 'save'])->name('user.save');