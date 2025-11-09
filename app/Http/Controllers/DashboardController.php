<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard setelah login.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Pastikan Anda memiliki file view di resources/views/dashboard/index.blade.php
        return view('dashboard'); 
    }
}