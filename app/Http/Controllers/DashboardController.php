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
    public function admin()
    {
        return view('admin.dashboard');
    }

}