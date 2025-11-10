<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Menampilkan form registrasi.
     */
    public function showRegisterForm()
    {
        return view('auth.registrasi');
    }

    /**
     * Menyimpan data user baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)],
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
            'role' => 'pengguna', // Menetapkan role default
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Cek role user
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang Admin!');
        }

        // Jika role bukan admin (pengguna biasa)
        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }

    return back()->withErrors([
        'login' => 'Username atau password salah.',
    ]);
}

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Menampilkan halaman edit profil pengguna.
     */
    public function editProfile()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();
        // Mengarahkan ke view 'auth.profile' dengan data user
        return view('auth.profile', compact('user'));
    }

    /**
     * Memperbarui data profil pengguna.
     */
    public function updateProfile(Request $request)
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        // Memperbarui data pengguna
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->no_telepon = $request->no_telepon;
        $user->alamat = $request->alamat;
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
