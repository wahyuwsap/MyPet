<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Untuk Registrasi, Login, Logout
use App\Http\Controllers\BookingController; // Untuk Formulir Booking
use App\Http\Controllers\DashboardController; // Asumsi: untuk halaman setelah login
use App\Http\Controllers\JadwalController;

/*
|--------------------------------------------------------------------------
| Route Akses Tamu (Guest)
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses oleh pengguna yang BELUM login.
*/

// Halaman utama (sebelum login)
Route::get('/', function () {
    // Panggil view yang berisi kode landing page (misalnya: login.blade.php)
    return view('auth.login'); 
})->name('home');

// Registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

/*
|--------------------------------------------------------------------------
| Route Akses Terautentikasi (Authenticated)
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses oleh pengguna yang SUDAH login.
*/

Route::middleware('auth')->group(function () {
    // Dashboard User
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Formulir Booking
    Route::get('/create', [BookingController::class, 'create'])->name('create'); 
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    
    // Profile (CRUD User)
    Route::get('/profile', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

    Route::prefix('admin')->group(function () {
        Route::resource('jadwal', JadwalController::class);
    });

    // Dashboard Admin (tetap dalam auth agar hanya bisa diakses user login)
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});
