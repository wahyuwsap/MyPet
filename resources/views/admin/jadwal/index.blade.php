<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Include Head Layout --}}
    @include('layouts.head')
    <title>Kelola Jadwal - MyPet</title>
</head>

<body class="bg-gray-50">
    {{-- Header Navigasi --}}
    @include('layouts.header')

    {{-- HERO SECTION --}}
    <section class="relative h-[22vh] flex items-center justify-center bg-gradient-to-r from-green-600 to-green-400">
        <div class="absolute inset-0 bg-green-700/50"></div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-2xl md:text-3xl font-bold mb-1">Kelola Jadwal</h1>
            <p class="text-gray-100 text-sm md:text-base max-w-2xl mx-auto">
                Manajemen semua jadwal operasional dan layanan di sistem MyPet.
            </p>
        </div>
    </section>

    {{-- KONTEN UTAMA --}}
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
            <a href="{{ route('admin.jadwal.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Jadwal Baru
            </a>
            <div class="flex items-center bg-green-50 border border-green-200 text-green-800 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm">
                <i class="fas fa-calendar-alt mr-2"></i>
                <span>Total Jadwal Tersedia: <strong>{{ $jadwals->count() }}</strong></span>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg relative mb-6 shadow" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200 bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-700">Daftar Jadwal</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hari</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Mulai</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Selesai</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kegiatan</th>
                            <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($jadwals as $jadwal)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6 text-sm text-gray-800 font-medium">{{ $jadwal->hari }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $jadwal->kegiatan }}</td>
                            <td class="py-4 px-6 text-center text-sm font-medium">
                                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="text-indigo-600 hover:text-indigo-800 transition mr-4"><i class="fas fa-edit mr-1"></i>Edit</a>
                                <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition"><i class="fas fa-trash mr-1"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-gray-500">Belum ada data jadwal yang ditambahkan.</td>
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
