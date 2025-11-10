<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
    <title>Edit Profil - MyPet</title>
</head>

<body class="bg-gray-50">
    @include('layouts.header')

    <main class="flex items-center justify-center min-h-screen py-16">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 mx-4 border border-gray-100">
            {{-- Judul --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Edit Profil Anda</h1>
                <p class="text-gray-500 text-sm mt-1">Perbarui informasi akun Anda.</p>
            </div>

            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Notifikasi Error --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Form Edit Profil --}}
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Username --}}
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" disabled
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 cursor-not-allowed" placeholder="Username Anda">
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" 
                        value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('nama_lengkap') border-red-500 @enderror" 
                        placeholder="Masukkan nama lengkap Anda">
                    @error('nama_lengkap')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" 
                        value="{{ old('email', $user->email) }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('email') border-red-500 @enderror" 
                        placeholder="Masukkan email Anda">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No Telepon --}}
                <div>
                    <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">
                        No. Telepon <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="no_telepon" name="no_telepon" 
                        value="{{ old('no_telepon', $user->no_telepon) }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('no_telepon') border-red-500 @enderror" 
                        placeholder="Masukkan nomor telepon Anda">
                    @error('no_telepon')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat <span class="text-red-500">*</span>
                    </label>
                    <textarea id="alamat" name="alamat" rows="3" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('alamat') border-red-500 @enderror" 
                        placeholder="Masukkan alamat lengkap Anda">{{ old('alamat', $user->alamat) }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-3 pt-2">
                    @php
                        // Tentukan route kembali berdasarkan role user
                        $backRoute = auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard');
                    @endphp

                    <a href="{{ $backRoute }}" 
                        class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-semibold py-2.5 px-6 rounded-lg transition-colors">
                        Batal
                    </a>

                    <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
