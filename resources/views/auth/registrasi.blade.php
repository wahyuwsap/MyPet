<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
    <title>Daftar - MyPet</title>
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <main class="flex items-center justify-center min-h-screen py-16">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8 mx-4">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Daftar Akun Baru</h1>
                <p class="text-gray-500 text-sm mt-1">Bergabunglah dengan MyPet untuk mendapatkan layanan grooming terbaik</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username <span class="text-red-500">*</span></label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('username')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('nama_lengkap')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                    <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan password">
                    @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ulangi password">
                </div>

                <div>
                    <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon <span class="text-red-500">*</span></label>
                    <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan nomor telepon">
                    @error('no_telepon')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat <span class="text-red-500">*</span></label>
                    <textarea id="alamat" name="alamat" rows="3" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                    @error('alamat')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-colors">Daftar</button>
                </div>

                <p class="text-center text-sm text-gray-600 mt-4">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login di sini</a></p>
            </form>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
