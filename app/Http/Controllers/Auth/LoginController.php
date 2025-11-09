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

    public function login(Request $request)
{
    // Validasi input
    $credentials = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required'],
    ]);

    // Coba otentikasi berdasarkan kolom username
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    // Jika gagal, tampilkan pesan error
    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ])->onlyInput('username');
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
