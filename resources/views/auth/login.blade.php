<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
    <title>Masuk - MyPet</title>
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <main class="flex items-center justify-center min-h-screen py-16">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 mx-4 border border-gray-100">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Masuk ke Akun Anda</h1>
                <p class="text-gray-500 text-sm mt-1">Silakan masuk untuk mengakses layanan grooming MyPet.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username *</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('username') border-red-500 @enderror" placeholder="Masukkan username Anda">
                    @error('username')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password *</label>
                    <input type="password" id="password" name="password" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan password Anda">
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-colors">Login</button>
                </div>

                <p class="text-center text-sm text-gray-600 mt-4">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
                </p>
            </form>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
