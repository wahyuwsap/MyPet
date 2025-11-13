<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Include Head Layout --}}
    @include('layouts.head')
    <title>Kelola Layanan - MyPet</title>
</head>

<body class="bg-gray-50">
    {{-- Header Navigasi --}}
    @include('layouts.header')

    {{-- HERO SECTION --}}
    <section class="relative h-[22vh] flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-400">
        <div class="absolute inset-0 bg-blue-700/50"></div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-2xl md:text-3xl font-bold mb-1">Kelola Layanan</h1>
            <p class="text-gray-100 text-sm md:text-base max-w-2xl mx-auto">
                Manajemen semua layanan yang tersedia di sistem MyPet.
            </p>
        </div>
    </section>

    {{-- KONTEN UTAMA --}}
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Tombol Tambah dan Statistik -->
        <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
            <a href="{{ route('admin.services.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Layanan Baru
            </a>
            <div class="flex items-center bg-blue-50 border border-blue-200 text-blue-800 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm">
                <i class="fas fa-cogs mr-2"></i>
                <span>Total Layanan Terdaftar: <strong>{{ $services->count() }}</strong></span>
            </div>
        </div>

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg relative mb-6 shadow" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tabel Data Layanan -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200 bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-700">Daftar Layanan</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Layanan</th>
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                            <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($services as $index => $service)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6 text-sm text-gray-800 font-medium">{{ $service->name }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                            <td class="py-4 px-6 text-center text-sm font-medium">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="text-indigo-600 hover:text-indigo-800 transition mr-4"><i class="fas fa-edit mr-1"></i>Edit</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition"><i class="fas fa-trash mr-1"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-10 text-gray-500">Belum ada data layanan yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>
