<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Untuk Registrasi, Login, Logout
use App\Http\Controllers\BookingController; // Untuk Formulir Booking
use App\Http\Controllers\DashboardController; // Asumsi: untuk halaman setelah login

/*
|--------------------------------------------------------------------------
| Route Akses Tamu (Guest)
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses oleh pengguna yang BELUM login.
*/

// Halaman utama (sebelum login)
Route::get('/', function () {
    // Panggil view yang berisi kode landing page (misalnya: welcome.blade.php)
    return view('welcome'); 
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
    
    // 1. Dashboard / Halaman Setelah Login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // 2. Booking (Formulir dan Penyimpanan)
    // Ingat: 'booking.booking' adalah nama view yang kita sepakati sebelumnya
    Route::get('create', [BookingController::class, 'create'])->name('create'); 
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    
    // 3. Logout (Dipicu oleh Form POST tersembunyi)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

});