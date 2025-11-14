<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Include Head Layout --}}
    @include('layouts.head')
    <title>Kelola Booking - MyPet</title>
</head>

<body class="bg-gray-50">
    {{-- Header Navigasi --}}
    @include('layouts.header')

    {{-- HERO SECTION --}}
    <section class="relative h-[22vh] flex items-center justify-center bg-gradient-to-r from-yellow-500 to-yellow-300">
        <div class="absolute inset-0 bg-yellow-600/50"></div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-2xl md:text-3xl font-bold mb-1">Kelola Booking</h1>
            <p class="text-gray-100 text-sm md:text-base max-w-2xl mx-auto">
                Manajemen semua pesanan layanan (booking) dari pengguna.
            </p>
        </div>
    </section>

    {{-- KONTEN UTAMA --}}
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex justify-end items-center gap-4 mb-8">
            <div class="flex items-center bg-yellow-50 border border-yellow-200 text-yellow-800 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm">
                <i class="fas fa-book mr-2"></i>
                <span>Total Booking Tercatat: <strong>{{ $bookings->count() }}</strong></span>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg relative mb-6 shadow" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200 bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-700">Daftar Booking</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama User</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($bookings as $booking)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6 text-sm text-gray-800 font-medium">{{ $booking->user->name }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $booking->service->nama_layanan }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">
                            @if($booking->jadwal)
                            {{ $booking->jadwal->hari }},
                            {{ \Carbon\Carbon::parse($booking->jadwal->jam_mulai)->format('H:i') }}
                            @else
                            <span class="text-red-500">Jadwal tidak tersedia</span>
                             @endif
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $booking->status }}</td>
                            <td class="py-4 px-6 text-center text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 transition">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-gray-500">Belum ada data booking.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    @include('layouts.footer')

</body>
</html>
