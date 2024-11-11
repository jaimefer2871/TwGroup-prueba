<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
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

//rooms
Route::prefix('rooms')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('room.index');
    Route::get('/create', [RoomController::class, 'create'])->name('room.create');
    Route::post('/save', [RoomController::class, 'store'])->name('room.store');
    Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
    Route::put('/update/{id}', [RoomController::class, 'update'])->name('room.update');
    Route::get('/delete/{id}', [RoomController::class, 'destroy'])->name('room.delete');

})->middleware('auth');

//reservations
Route::prefix('reservations')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/save', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/edit/{id}', [ReservationController::class, 'edit'])->name('reservation.edit');
    Route::put('/update/{id}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::get('/delete/{id}', [ReservationController::class, 'destroy'])->name('reservation.delete');

})->middleware('auth');
