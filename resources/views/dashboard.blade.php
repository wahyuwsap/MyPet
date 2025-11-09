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

{{-- ... (Bagian HEAD dan HEADER di atas sama) ... --}}

<main class="min-h-screen py-16 px-4 md:px-8 lg:px-12 bg-gray-50">
    <div class="container mx-auto">
        
        {{-- Header Dashboard --}}
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500 mt-1 mb-6">
            Selamat datang kembali! Kelola jadwal dan booking Anda di sini.
        </p>

        ---

        {{-- 3 Kartu Ringkasan (Summary Cards) --}}
        {{-- ... (Kode Kartu Ringkasan Anda sama) ... --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            
            {{-- Kartu Booking Baru (Pastikan route('create') adalah route('booking.create') )--}}
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col justify-between border border-gray-100">
                <div>
                    <div class="flex items-center text-blue-600 mb-3">
                        <i class="fas fa-calendar-alt text-2xl mr-3 p-2 bg-blue-50 rounded-lg"></i>
                        <h3 class="text-lg font-semibold">Booking Baru</h3>
                    </div>
                    <p class="text-sm text-gray-500 mb-4">Jadwalkan appointment</p>
                </div>
                <a href="{{ route('create') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-xl text-center transition-colors">
                    Buat Booking
                </a>
            </div>

            {{-- Kartu Booking Aktif --}}
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center text-green-600 mb-3">
                    <i class="fas fa-check-circle text-2xl mr-3 p-2 bg-green-50 rounded-lg"></i>
                    <h3 class="text-lg font-semibold">Booking Aktif</h3>
                </div>
                {{-- Data dinamis akan dimasukkan di sini, saat ini hardcoded --}}
                <p class="text-2xl font-bold text-gray-800">2</p>
                <p class="text-sm text-gray-500 mt-1">appointment mendatang</p>
            </div>

            {{-- Kartu Total Kunjungan --}}
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center text-purple-600 mb-3">
                    <i class="fas fa-heart text-2xl mr-3 p-2 bg-purple-50 rounded-lg"></i>
                    <h3 class="text-lg font-semibold">Total Kunjungan</h3>
                </div>
                {{-- Data dinamis akan dimasukkan di sini, saat ini hardcoded --}}
                <p class="text-2xl font-bold text-gray-800">15</p>
                <p class="text-sm text-gray-500 mt-1">kali grooming</p>
            </div>
        </div>
        
        ---

        {{-- Konten Utama (Tabbed Content) --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            
            {{-- Navigasi Tab --}}
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs" id="dashboard-tabs">
                    {{-- Tab Jadwal Tersedia --}}
                    <a href="#jadwal" class="tab-link border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 font-medium text-sm" 
                       data-tab="jadwal">
                        Jadwal Tersedia
                    </a>
                    {{-- Tab Riwayat Booking (Default Aktif) --}}
                    <a href="#riwayat" class="tab-link border-b-2 border-blue-600 text-blue-600 whitespace-nowrap py-4 px-1 font-medium text-sm" 
                       data-tab="riwayat" aria-current="page">
                        Riwayat Booking
                    </a>
                    {{-- Tab Notifikasi --}}
                    <a href="#notifikasi" class="tab-link border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 font-medium text-sm"
                       data-tab="notifikasi">
                        Notifikasi
                    </a>
                </nav>
            </div>

            {{-- CONTAINER KONTEN TAB --}}
            <div class="mt-6">
                
                {{-- 1. KONTEN JADWAL TERSEDIA --}}
             
                <div id="jadwal-content" class="tab-content" style="display: none;">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Jadwal Tersedia</h2>
                    
                    @php
                        // Data Jadwal Tersedia (Hardcoded untuk tampilan)
                        $schedules = [
                            ['service' => 'Grooming Anjing', 'date' => '2024-01-15', 'time' => '09:00'],
                            ['service' => 'Grooming Kucing', 'date' => '2024-01-15', 'time' => '11:00'],
                            ['service' => 'Mandi & Spa', 'date' => '2024-01-16', 'time' => '10:00'],
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
                </div>

                
                {{-- 2. KONTEN RIWAYAT BOOKING (Default DITAMPILKAN) --}}
                
                <div id="riwayat-content" class="tab-content" style="display: block;">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Riwayat Booking</h2>
                    
                    @php
                        // Data Riwayat Booking (Hardcoded untuk tampilan)
                        $history = [
                            ['service' => 'Grooming Anjing - Buddy', 'date' => '2024-01-10', 'time' => '09:00', 'status' => 'Selesai', 'status_color' => 'green'],
                            ['service' => 'Mandi & Spa - Mimi', 'date' => '2024-01-08', 'time' => '11:00', 'status' => 'Selesai', 'status_color' => 'green'],
                            ['service' => 'Perawatan Kuku - Charlie', 'date' => '2024-01-05', 'time' => '14:00', 'status' => 'Dibatalkan', 'status_color' => 'red'],
                        ];
                    @endphp

                    @foreach ($history as $item)
                    <div class="flex items-center justify-between p-4 mb-3 bg-white rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            {{-- Icon --}}
                            <i class="fas fa-paw text-purple-500 mr-4"></i>
                            <div>
                                <p class="font-medium text-gray-800">{{ $item['service'] }}</p>
                                <p class="text-sm text-gray-500">{{ $item['date'] }} - {{ $item['time'] }}</p>
                            </div>
                        </div>
                        {{-- Status Tag --}}
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            @if($item['status_color'] == 'green') bg-green-100 text-green-700 
                            @elseif($item['status_color'] == 'red') bg-red-100 text-red-700 
                            @endif">
                            {{ $item['status'] }}
                        </span>
                    </div>
                    @endforeach
                </div>
            
               
                {{-- 3. KONTEN NOTIFIKASI --}}
               
                <div id="notifikasi-content" class="tab-content" style="display: none;">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Notifikasi</h2>

                    @php
                        // Data Notifikasi (Hardcoded untuk tampilan)
                        $notifications = [
                            ['text' => 'Booking Anda untuk Buddy pada 15 Jan 2024 telah dikonfirmasi', 'time' => '2 jam lalu', 'icon' => 'fas fa-check-circle', 'bg' => 'bg-green-50', 'text_color' => 'text-green-700'],
                            ['text' => 'Jangan lupa appointment Anda besok pukul 09:00', 'time' => '1 hari lalu', 'icon' => 'fas fa-clock', 'bg' => 'bg-blue-50', 'text_color' => 'text-blue-700'],
                            ['text' => 'Promo spesial! Diskon 20% untuk grooming kucing!', 'time' => '3 hari lalu', 'icon' => 'fas fa-tag', 'bg' => 'bg-yellow-50', 'text_color' => 'text-yellow-700'],
                        ];
                    @endphp

                    @foreach ($notifications as $notif)
                    <div class="flex items-start p-4 mb-3 {{ $notif['bg'] }} rounded-lg border border-gray-200">
                        <i class="{{ $notif['icon'] }} {{ $notif['text_color'] }} text-lg mr-4 mt-1"></i>
                        <div>
                            <p class="font-medium text-gray-800">{{ $notif['text'] }}</p>
                            <p class="text-sm text-gray-500 mt-0.5">{{ $notif['time'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</main>

{{-- ... (Bagian FOOTER dan Tombol Chat di bawah sama) ... --}}

{{-- LOGIKA JAVASCRIPT UNTUK TAB SWITCHING --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        // Fungsi untuk menampilkan konten tab yang dipilih
        function showTab(tabName) {
            // Sembunyikan semua konten tab
            tabContents.forEach(content => {
                content.style.display = 'none';
            });
            // Hapus kelas aktif dari semua link tab
            tabLinks.forEach(link => {
                link.classList.remove('border-blue-600', 'text-blue-600');
                link.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
            });

            // Tampilkan konten yang sesuai
            const activeContent = document.getElementById(tabName + '-content');
            if (activeContent) {
                activeContent.style.display = 'block';
            }
            // Tambahkan kelas aktif pada link tab yang diklik
            const activeLink = document.querySelector(`.tab-link[data-tab="${tabName}"]`);
            if (activeLink) {
                activeLink.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                activeLink.classList.add('border-blue-600', 'text-blue-600');
            }
        }
        
        // Atur Riwayat Booking sebagai default aktif (sesuai setting style="display: block;")
        showTab('riwayat');

        // Tambahkan event listener ke setiap link tab
        tabLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const tabName = this.getAttribute('data-tab');
                showTab(tabName);
            });
        });
    });
</script>

</body>
</html>