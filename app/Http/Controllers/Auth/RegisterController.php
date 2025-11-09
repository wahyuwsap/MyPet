<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman registrasi
     */
    public function showRegistrationForm()
    {
        // Pastikan view 'registrasi.blade.php' ada di resources/views/
        return view('registrasi');
    }

    /**
     * Memproses data pendaftaran user baru
     */
    public function register(Request $request)
    {
        // ✅ Validasi input sesuai kolom tabel users
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'no_telepon' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Gunakan field 'password_confirmation' di form
        ]);

        // ✅ Membuat user baru & mengenkripsi password
        $user = User::create([
            'username'     => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'no_telepon'   => $request->no_telepon,
            'alamat'       => $request->alamat,
            'password'     => Hash::make($request->password),
        ]);

        // ✅ Login otomatis setelah register
        Auth::login($user);

        // ✅ Redirect ke dashboard (pastikan route 'dashboard' sudah ada)
        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil! Selamat datang di MyPet 🐾');
    }
}
