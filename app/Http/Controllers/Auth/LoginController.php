<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan view login (resources/views/auth/login.blade.php)
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    // Memproses permintaan login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba otentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke dashboard setelah berhasil login
            return redirect()->intended(route('dashboard'));
        }

        // Gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Memproses permintaan logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman awal (Landing Page)
        return redirect('/');
    }
}
