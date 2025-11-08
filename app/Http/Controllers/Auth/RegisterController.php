<?php

// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Penting: Pastikan Anda mengimpor Model User

class RegisterController extends Controller
{
    // Menampilkan view register (resources/views/auth/register.blade.php)
    public function showRegistrationForm()
    {
        return view('registrasi'); 
    }

    // Memproses permintaan pendaftaran
    public function register(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 'confirmed' membutuhkan field password_confirmation
        ]);

        // Membuat User Baru dan otomatis mengenkripsi password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password WAJIB (Memenuhi kriteria Enkripsi Data)
        ]);

        // Otomatis login setelah register berhasil
        Auth::login($user);

        // Redirect ke dashboard
        return redirect(route('dashboard'));
    }
}
