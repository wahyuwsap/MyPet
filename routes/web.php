<?php

use Illuminate\Support\Facades\Route;

// === Controllers (frontend / root) ===
use App\Http\Controllers\AuthController;           // login / register / profile (exists)
use App\Http\Controllers\DashboardController;     // dashboard user (root)
use App\Http\Controllers\BookingController;       // booking user (root)
use App\Http\Controllers\JadwalController;        // jadwal user (root, if any)
use App\Http\Controllers\ServiceController;       // service user (root, if any)

// === Admin Controllers (folder Admin) ===
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;

// Admin dashboard controller (you have this as top-level file)
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
--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // user dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // booking (frontend user)
    Route::get('/create', [BookingController::class, 'create'])->name('create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // profile
    Route::get('/profile', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    // logout (must be POST in form with @csrf)
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

            // admin dashboard (uses AdminDashboardController at root)
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

            // admin resources
            Route::resource('services', AdminServiceController::class);
            Route::resource('jadwal', AdminJadwalController::class);
            Route::resource('bookings', AdminBookingController::class);
            Route::resource('users', UserController::class);
        });
});
