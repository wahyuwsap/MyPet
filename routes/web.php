<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Untuk Registrasi, Login, Logout
use App\Http\Controllers\BookingController; // Untuk Formulir Booking
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController; // Asumsi: untuk halaman setelah login

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

    // Grup route khusus untuk Admin
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('jadwal', JadwalController::class);

        // Rute untuk Manajemen User
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    });

});
