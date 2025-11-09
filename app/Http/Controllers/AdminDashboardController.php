<?php

namespace App\Http\Controllers; // Pastikan namespace ini sudah benar

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalServices = Service::count();
        $totalBookings = Booking::count();

        // Pastikan view 'admin.dashboard' ada
        return view('admin.dashboard', compact('totalUsers', 'totalServices', 'totalBookings'));
    }
}