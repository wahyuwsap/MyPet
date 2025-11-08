<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController; // Jika Anda sudah membuat ini
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

// --- Rute Autentikasi Manual ---

// Rute untuk user yang BELUM LOGIN (@guest)
Route::middleware('guest')->group(function () {
    // 1. Tampilan Form Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    
    // 2. Proses Login (Mengirim data form)
    Route::post('/login', [LoginController::class, 'login']);

    // (Opsional) Rute Register/Daftar
    // Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('/register', [RegisterController::class, 'register']);
});

// Rute untuk user yang SUDAH LOGIN (@auth)
Route::middleware('auth')->group(function () {
    // 3. Proses Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Rute dashboard/halaman setelah login, yang memerlukan otorisasi
    Route::get('/dashboard', function () {
        return view('home'); // Ganti 'home' dengan nama view dashboard Anda jika berbeda
    })->name('dashboard');
});

// Rute Landing Page (Umum)
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    // Rute Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // 1. Tampilan Form Register/Daftar
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    
    // 2. Proses Register/Pendaftaran (Menyimpan data user baru)
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::resource('services', ServiceController::class);