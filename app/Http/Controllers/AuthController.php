<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

    class AuthController extends Controller
    {
        // Tampilkan form register
        public function showRegisterForm()
        {
            return view('auth.registrasi');
        }

        // Proses register (store)
        public function store(Request $request)
        {
            $request->validate([
                'username' => 'required|string|max:255|unique:users,username',
                'nama_lengkap' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'no_telepon' => 'required|string|max:15',
                'alamat' => 'required|string',
            ]);

            User::create([
                'username' => $request->username,
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
            ]);

            // 🟢 Setelah registrasi, arahkan ke halaman login
           return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');

        }

        // Tampilkan form login
        public function showLoginForm()
        {
            return view('auth.login');
        }

        // Proses login (pakai username)
        public function login(Request $request)
        {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'Selamat datang di MyPet!');
            }

            return back()->withErrors([
                'loginError' => 'Login Gagal! Username atau password salah.',
            ])->withInput();
        }

        // Logout
        public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // 🟢 UBAH BAGIAN INI: Arahkan ke root URL (/)
            return redirect('/')->with('success', 'Berhasil logout.'); 
        }
        
        
}
