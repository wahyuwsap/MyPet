<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Include Head Layout --}}
    @include('layouts.head')
    <title>Edit Jadwal - MyPet</title> 
</head>

<body class="bg-gray-100">
    {{-- Header Navigasi --}}
    @include('layouts.header')

    {{-- KONTEN UTAMA --}}
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Jadwal</h1>

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

            <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Hari -->
                <div class="mb-6">
                    <label for="hari" class="block text-gray-700 text-sm font-bold mb-2">Hari</label>
                    <input type="text" id="hari" name="hari" value="{{ old('hari', $jadwal->hari) }}" class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Contoh: Senin" required>
                </div>

                <!-- Jam Mulai & Selesai -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="jam_mulai" class="block text-gray-700 text-sm font-bold mb-2">Jam Mulai</label>
                        <input type="time" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div>
                        <label for="jam_selesai" class="block text-gray-700 text-sm font-bold mb-2">Jam Selesai</label>
                        <input type="time" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                </div>

                <!-- Kegiatan -->
                <div class="mb-8">
                    <label for="kegiatan" class="block text-gray-700 text-sm font-bold mb-2">Kegiatan</label>
                    <input type="text" id="kegiatan" name="kegiatan" value="{{ old('kegiatan', $jadwal->kegiatan) }}" class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Contoh: Jam Operasional" required>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('admin.jadwal.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition duration-300">Batal</a>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                        Perbarui Jadwal
                    </button>
                </div>
            </form>
        </div>
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>