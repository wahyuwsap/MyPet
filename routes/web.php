<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Route Akses Tamu (Guest)
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses oleh pengguna yang BELUM login.
*/

// Halaman utama (sebelum login)
Route::get('/', function () {
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

    // Dashboard User (non-admin)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Formulir Booking
    Route::get('/create', [BookingController::class, 'create'])->name('create'); 
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Profile (CRUD User)
    Route::get('/profile', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Route Khusus Admin
    |--------------------------------------------------------------------------
    | Semua route di bawah prefix "admin/" hanya bisa diakses admin
    */
    Route::middleware(['auth', 'checkRole:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

        // ✅ Service (sudah benar)
        Route::resource('services', ServiceController::class);

        // ✅ Jadwal (TAMBAHKAN INI)
        Route::resource('jadwal', JadwalController::class);

        // ✅ Booking (TAMBAHKAN INI)
        Route::resource('bookings', BookingController::class);

        // ✅ USERS (ubah dari yang sebelumnya menjadi resource agar route admin.users.index ada)
        Route::resource('users', UserController::class);
    });


});