<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoomController::class, 'home']);
Route::get('/rooms/{room}', [RoomController::class, 'show']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::get('/bookings/create', [BookingController::class, 'create']);
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::post('/bookings/{booking}/review', [BookingController::class, 'review']);
    Route::post('/rooms/{room}/comments', [RoomController::class, 'comment']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/admin/bookings/{booking}/status', [AdminController::class, 'status']);

    Route::get('/admin/rooms', [RoomController::class, 'index']);
    Route::get('/admin/rooms/create', [RoomController::class, 'create']);
    Route::post('/admin/rooms', [RoomController::class, 'store']);
    Route::get('/admin/rooms/{room}/edit', [RoomController::class, 'edit']);
    Route::post('/admin/rooms/{room}', [RoomController::class, 'update']);
    Route::post('/admin/rooms/{room}/delete', [RoomController::class, 'destroy']);
});
