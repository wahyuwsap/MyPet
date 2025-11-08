<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

// =============================
// 🔹 AUTH ROUTES
// =============================

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =============================
// 🔹 DASHBOARD (setelah login)
// =============================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// =============================
// 🔹 HALAMAN UMUM
// =============================
Route::get('/', function () {
    return view('welcome');
});

// =============================
// 🔹 RESOURCE ROUTES (lainnya)
// =============================
Route::resource('services', ServiceController::class);
Route::resource('bookings', BookingController::class);
