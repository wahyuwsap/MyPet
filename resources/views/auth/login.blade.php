<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Pastikan ini menyertakan Tailwind CSS dan Font Awesome --}}
    @include('layouts.head') 
    <title>Masuk ke Akun Anda - MyPet</title>
</head>
<body class="bg-gray-50">
    
    {{-- 2. MEMANGGIL ELEMEN HEADER (NAVIGASI) --}}
    {{-- Asumsi header/navigasi Anda ada di sini --}}
    @include('layouts.header')

    {{-- Konten Utama Form Login --}}
    <main class="flex items-center justify-center min-h-screen py-16">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 mx-4 border border-gray-100">
            
            {{-- Judul Halaman --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Masuk ke Akun Anda</h1>
                <p class="text-gray-500 text-sm mt-1">
                    Silakan masuk untuk mengakses layanan grooming MyPet.
                </p>
            </div>

            {{-- Pesan Gagal Login (Sesuai Gambar Anda) --}}
            {{-- Cek apakah ada error dari controller (berupa array errors) --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{-- Kita hanya menampilkan pesan error utama dari 'username' --}}
                    <span class="block sm:inline">Login Gagal! Username atau password salah.</span>
                </div>
            @endif

            {{-- Form Login --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                {{-- 1. Username/Email --}}
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                        Username *
                    </label>
                    {{-- KRUSIAL: name="username" harus sesuai dengan LoginController --}}
                    <input type="text" id="username" name="username"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none 
                                @error('username') border-red-500 @enderror" 
                        placeholder="Masukkan username Anda" 
                        value="{{ old('username') }}"
                        required autofocus>

                    {{-- Pesan Error Khusus Username/Email --}}
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 2. Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password *
                    </label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan password Anda" required>
                </div>

                {{-- Tombol Login --}}
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-colors">
                        Login
                    </button>
                </div>

                {{-- Belum punya akun --}}
                <p class="text-center text-sm text-gray-600 mt-4">
                    Belum punya akun?
                    {{-- Ganti route('register') dengan nama route registrasi Anda --}}
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
                </p>
            </form>
        </div>
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>