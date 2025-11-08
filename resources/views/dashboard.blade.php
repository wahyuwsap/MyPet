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

<main class="min-h-screen py-16 px-4 md:px-8 lg:px-12 bg-gray-50">
    <div class="container mx-auto">
        
        {{-- Header Dashboard --}}
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500 mt-1 mb-6">
            Selamat datang kembali! Kelola jadwal dan booking Anda di sini.
        </p>

        ---

        {{-- 3 Kartu Ringkasan (Summary Cards) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            {{-- Kartu Booking Baru --}}
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col justify-between border border-gray-100">
                <div>
                    <div class="flex items-center text-blue-600 mb-3">
                        <i class="fas fa-calendar-alt text-2xl mr-3 p-2 bg-blue-50 rounded-lg"></i>
                        <h3 class="text-lg font-semibold">Booking Baru</h3>
                    </div>
                    <p class="text-sm text-gray-500 mb-4">Jadwalkan appointment</p>
                </div>
                <a href="{{ route('booking.create') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-xl text-center transition-colors">
                    Buat Booking
                </a>
            </div>

            {{-- Kartu Booking Aktif --}}
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center text-green-600 mb-3">
                    <i class="fas fa-check-circle text-2xl mr-3 p-2 bg-green-50 rounded-lg"></i>
                    <h3 class="text-lg font-semibold">Booking Aktif</h3>
                </div>
                <p class="text-2xl font-bold text-gray-800">2</p>
                <p class="text-sm text-gray-500 mt-1">appointment mendatang</p>
            </div>

            {{-- Kartu Total Kunjungan --}}
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center text-purple-600 mb-3">
                    <i class="fas fa-heart text-2xl mr-3 p-2 bg-purple-50 rounded-lg"></i>
                    <h3 class="text-lg font-semibold">Total Kunjungan</h3>
                </div>
                <p class="text-2xl font-bold text-gray-800">15</p>
                <p class="text-sm text-gray-500 mt-1">kali grooming</p>
            </div>
        </div>
        
        ---

        {{-- Konten Utama (Jadwal dan Riwayat) --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            
            {{-- Navigasi Tab --}}
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    {{-- Tab Jadwal Tersedia (Aktif) --}}
                    <a href="#" class="border-b-2 border-blue-600 text-blue-600 whitespace-nowrap py-4 px-1 font-medium text-sm" aria-current="page">
                        Jadwal Tersedia
                    </a>
                    {{-- Tab Riwayat Booking --}}
                    <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 font-medium text-sm">
                        Riwayat Booking
                    </a>
                    {{-- Tab Notifikasi --}}
                    <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 font-medium text-sm">
                        Notifikasi
                    </a>
                </nav>
            </div>

            {{-- Daftar Jadwal Tersedia --}}
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Jadwal Tersedia</h2>
                
                {{-- Item Jadwal --}}
                @php
                    $schedules = [
                        ['service' => 'Grooming Anjing', 'date' => '2024-01-15', 'time' => '09:00'],
                        ['service' => 'Grooming Kucing', 'date' => '2024-01-15', 'time' => '11:00'],
                        ['service' => 'Mandi & Spa', 'date' => '2024-01-16', 'time' => '10:00'],
                        ['service' => 'Perawatan Kuku', 'date' => '2024-01-16', 'time' => '14:00'],
                    ];
                @endphp

                @foreach ($schedules as $schedule)
                <div class="flex items-center justify-between p-4 mb-3 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt text-blue-500 mr-4"></i>
                        <div>
                            <p class="font-medium text-gray-800">{{ $schedule['service'] }}</p>
                            <p class="text-sm text-gray-500">{{ $schedule['date'] }} - {{ $schedule['time'] }}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                        Tersedia
                    </span>
                </div>
                @endforeach
                
                {{-- Anda bisa menambahkan pagination atau tombol "Lihat Semua" di sini --}}

            </div>
        </div>

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