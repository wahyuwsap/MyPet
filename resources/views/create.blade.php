<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Memuat asset head (seperti Tailwind CSS) --}}
    @include('layouts.head') 
    <title>Buat Booking Baru - MyPet</title>
</head>
<body class="bg-gray-50">
    {{-- Memuat header --}}
    @include('layouts.header') 

    <main class="flex items-center justify-center min-h-screen py-16">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-8 mx-4 border border-gray-100">
            
            {{-- Header Formulir --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Buat Booking Baru</h1>
                <p class="text-gray-500 text-sm mt-1">Isi formulir di bawah untuk menjadwalkan appointment grooming.</p>
            </div>

            {{-- Pesan Sukses/Error Global --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $errors->first('error') }}</span>
                </div>
            @endif

            {{-- FORM BOOKING --}}
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-5">
                @csrf
                
                {{-- 1. Nama Peliharaan --}}
                <div>
                    <label for="nama_peliharaan" class="block text-sm font-medium text-gray-700 mb-1">Nama Peliharaan <span class="text-red-500">*</span></label>
                    <input type="text" id="nama_peliharaan" name="nama_peliharaan" value="{{ old('nama_peliharaan') }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('nama_peliharaan') border-red-500 @enderror" 
                        placeholder="Masukkan nama peliharaan Anda">
                    @error('nama_peliharaan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- 2. Pilihan Layanan --}}
                <div>
                    <label for="pilihan_layanan" class="block text-sm font-medium text-gray-700 mb-1">Pilihan Layanan <span class="text-red-500">*</span></label>
                    <select id="pilihan_layanan" name="pilihan_layanan" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white @error('pilihan_layanan') border-red-500 @enderror">
                        
                        <option value="" disabled {{ old('pilihan_layanan') == '' ? 'selected' : '' }}>Pilih layanan yang diinginkan</option>
                        
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ old('pilihan_layanan') == $service->id ? 'selected' : '' }}>
                                {{ $service->name }} 
                            </option>
                        @endforeach
                    </select>
                    @error('pilihan_layanan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- 3. Pilih Tanggal --}}
                <div>
                    <label for="pilih_tanggal" class="block text-sm font-medium text-gray-700 mb-1">Pilih Tanggal <span class="text-red-500">*</span></label>
                    <input type="date" id="pilih_tanggal" name="pilih_tanggal" value="{{ old('pilih_tanggal') }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('pilih_tanggal') border-red-500 @enderror">
                    @error('pilih_tanggal')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                
                {{-- 4. Jadwal (Waktu) --}}
                <div>
                    <label for="jadwal" class="block text-sm font-medium text-gray-700 mb-1">Jadwal <span class="text-red-500">*</span></label>
                    <select id="jadwal" name="jadwal" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white @error('jadwal') border-red-500 @enderror">
                        
                        <option value="" disabled {{ old('jadwal') == '' ? 'selected' : '' }}>Pilih waktu yang tersedia</option>
                        
                        @foreach ($availableTimes as $time)
                            <option value="{{ $time }}" {{ old('jadwal') == $time ? 'selected' : '' }}>
                                {{ $time }} 
                            </option>
                        @endforeach
                    </select>
                    @error('jadwal')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- 5. Catatan (Opsional) --}}
                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional)</label>
                    <textarea id="catatan" name="catatan" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('catatan') border-red-500 @enderror" 
                        placeholder="Tambahkan catatan khusus untuk peliharaan Anda...">{{ old('catatan') }}</textarea>
                    @error('catatan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-3 pt-2">
                    <a href="{{ url('/') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-semibold py-2.5 px-6 rounded-lg transition-colors">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg transition-colors">Buat Booking</button>
                </div>
            </form>
        </div>
    </main>

    {{-- Memuat footer --}}
    @include('layouts.footer')
</body>
</html>