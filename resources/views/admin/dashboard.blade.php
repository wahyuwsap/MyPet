<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Include Head Layout --}}
    @include('layouts.head')
    <title>Dashboard Admin - MyPet</title>
</head>

<body class="bg-gray-50">
    {{-- Header Navigasi --}}
    @include('layouts.header')

    {{-- HERO SECTION (Dashboard Admin) --}}
    <section class="relative h-[22vh] flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-400">
        <div class="absolute inset-0 bg-blue-700/50"></div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-2xl md:text-3xl font-bold mb-1">Dashboard Admin</h1>
            <p class="text-gray-100 text-sm md:text-base max-w-2xl mx-auto">
                Kelola semua data pengguna, layanan, jadwal, dan booking di sistem MyPet.
            </p>
        </div>
    </section>

    {{-- KONTEN UTAMA --}}
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- SECTION: STATISTIK SISTEM --}}
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Statistik Sistem</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                {{-- Total Pengguna --}}
                <div class="bg-blue-50 border-t-4 border-blue-500 rounded-xl shadow-md p-6 text-center">
                    <div class="inline-flex p-3 bg-blue-100 rounded-full text-blue-600 mb-3">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-gray-700 font-semibold text-lg mb-1">Total Pengguna</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\User::count() }}</p>
                </div>

                {{-- Total Jadwal --}}
                <div class="bg-blue-50 border-t-4 border-blue-500 rounded-xl shadow-md p-6 text-center">
                    <div class="inline-flex p-3 bg-blue-100 rounded-full text-blue-600 mb-3">
                        <i class="fas fa-calendar-alt text-2xl"></i>
                    </div>
                    <h3 class="text-gray-700 font-semibold text-lg mb-1">Total Jadwal</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Jadwal::count() }}</p>
                </div>

                {{-- Total Booking --}}
                <div class="bg-blue-50 border-t-4 border-blue-500 rounded-xl shadow-md p-6 text-center">
                    <div class="inline-flex p-3 bg-blue-100 rounded-full text-blue-600 mb-3">
                        <i class="fas fa-book text-2xl"></i>
                    </div>
                    <h3 class="text-gray-700 font-semibold text-lg mb-1">Total Booking</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Booking::count() }}</p>
                </div>

                {{-- Total Layanan --}}
                <div class="bg-blue-50 border-t-4 border-blue-500 rounded-xl shadow-md p-6 text-center">
                    <div class="inline-flex p-3 bg-blue-100 rounded-full text-blue-600 mb-3">
                        <i class="fas fa-cogs text-2xl"></i>
                    </div>
                    <h3 class="text-gray-700 font-semibold text-lg mb-1">Total Layanan</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Service::count() }}</p>
                </div>
            </div>
        </section>

        {{-- SECTION: AKSI CEPAT --}}
<section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Aksi Cepat</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <a href="{{ route('admin.services.index') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-center py-4 rounded-xl shadow-lg transition">
            Kelola Layanan
        </a>

        <a href="{{ route('admin.jadwal.index') }}"
           class="bg-green-600 hover:bg-green-700 text-white text-center py-4 rounded-xl shadow-lg transition">
            Kelola Jadwal
        </a>

        <a href="{{ route('admin.bookings.index') }}"
           class="bg-yellow-600 hover:bg-yellow-700 text-white text-center py-4 rounded-xl shadow-lg transition">
            Kelola Booking
        </a>

        <a href="{{ route('admin.users.index') }}"
           class="bg-purple-600 hover:bg-purple-700 text-white text-center py-4 rounded-xl shadow-lg transition">
            Kelola Users
        </a>

    </div>
</section>


    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>
