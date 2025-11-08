<!DOCTYPE html>
<html lang="id">
<head>
    {{-- 1. MEMANGGIL ELEMEN HEAD (Pastikan ini menyertakan Tailwind CSS dan Font Awesome) --}}
    @include('layouts.head') 
    <title>MyPet - Perawatan Terbaik untuk Hewan Kesayangan</title>
</head>
<body class="bg-gray-50">
    
    {{-- 2. MEMANGGIL ELEMEN HEADER (NAVIGASI) --}}
    {{-- Kita asumsikan Header yang Anda buat sebelumnya di-include di sini --}}
    @include('layouts.header')

    {{-- Konten Utama --}}
    <main class="flex items-center justify-center min-h-screen py-16">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8 mx-4">
            
            {{-- Judul Halaman --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Daftar Akun Baru</h1>
                <p class="text-gray-500 text-sm mt-1">
                    Bergabunglah dengan MyPet untuk mendapatkan layanan grooming terbaik
                </p>
            </div>

            {{-- Form Registrasi --}}
            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Username --}}
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                        Username <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="username" name="username"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan username" required>
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama lengkap" required>
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan email" required>
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan password" required>
                </div>

                {{-- Nomor Telepon --}}
                <div>
                    <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">
                        No. Telepon <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="no_telepon" name="no_telepon"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nomor telepon" required>
                </div>

                {{-- Alamat --}}
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat <span class="text-red-500">*</span>
                    </label>
                    <textarea id="alamat" name="alamat" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                {{-- Tombol Daftar --}}
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-colors">
                        Daftar
                    </button>
                </div>

                {{-- Sudah punya akun --}}
                <p class="text-center text-sm text-gray-600 mt-4">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login di sini</a>
                </p>
            </form>
        </div>
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Tombol Chat di pojok kanan bawah --}}
    <div class="fixed bottom-6 right-6">
        <a href="#" class="bg-black text-white px-5 py-3 rounded-full flex items-center shadow-2xl hover:bg-gray-800 transition-colors">
            <i class="fas fa-comments mr-2"></i> Talk with Us
        </a>
    </div>

</body>
</html>
