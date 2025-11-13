<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Include Head Layout --}}
    @include('layouts.head')
    <title>Tambah Layanan Baru - MyPet</title>
</head>

<body class="bg-gray-100">
    {{-- Header Navigasi --}}
    @include('layouts.header')

    {{-- KONTEN UTAMA --}}
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Layanan Baru</h1>

            {{-- Menampilkan error validasi --}}
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                    <p class="font-bold">Oops! Ada beberapa masalah:</p>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <!-- Nama Layanan -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Layanan</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Grooming Lengkap" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi (Opsional)</label>
                    <textarea id="description" name="description" rows="4" class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Jelaskan tentang layanan ini">{{ old('description') }}</textarea>
                </div>

                <!-- Harga -->
                <div class="mb-8">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0" required step="1000">
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('admin.services.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition duration-300">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                        Simpan Layanan
                    </button>
                </div>
            </form>
        </div>
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>
