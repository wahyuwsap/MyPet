<?php

use Illuminate\Support\Facades\Route;

// === Controllers (frontend / root) ===
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ServiceController;

// === Admin Controllers ===
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Guest (not logged in)
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('auth.login'); })->name('home');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

/*
|--------------------------------------------------------------------------
| Authenticated (user)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // FIXED ROUTE NAME (penting!)
    Route::get('/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Profile
    Route::get('/profile', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Admin (role admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware('checkRole:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

            Route::resource('services', AdminServiceController::class);
            Route::resource('jadwal', AdminJadwalController::class);
            Route::resource('bookings', AdminBookingController::class);
            Route::resource('users', UserController::class);
        });
});
