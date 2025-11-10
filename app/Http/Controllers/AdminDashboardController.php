<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Jadwal; // tambahkan kalau model Jadwal sudah ada

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Hitung total data dari tiap tabel
        $totalUsers = User::count();
        $totalServices = Service::count();
        $totalBookings = Booking::count();
        $totalJadwal = Jadwal::count();

        // Kirim data ke view
        return view('admin.dashboard', compact('totalUsers', 'totalServices', 'totalBookings', 'totalJadwal'));
    }
}
