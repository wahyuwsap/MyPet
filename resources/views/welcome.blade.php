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

    {{-- KONTEN UTAMA LANDING PAGE --}}
    <main>
        
        {{-- SECTION 1: HERO (Perawatan Terbaik untuk Hewan Kesayangan) --}}
        <section class="relative h-[80vh] min-h-[550px] flex items-center pt-24"
                 style="background-image: url('{{ asset('images/hero-mypet.jpg') }}'); background-size: cover; background-position: center;">
            
            {{-- Layer Gradien Hitam (untuk kontras teks) --}}
            <div class="absolute inset-0 bg-black/50"></div>
            
            <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                
                {{-- Teks Utama --}}
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 leading-tight">
                        Perawatan Terbaik untuk <br class="hidden md:inline">
                        <span class="text-blue-400">Hewan Kesayangan</span>
                    </h1>
                    <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                        MyPet menyediakan layanan grooming profesional dengan tim berpengalaman dan fasilitas modern untuk memberikan perawatan terbaik bagi hewan peliharaan Anda.
                    </p>
                    
                    {{-- Tombol Aksi --}}
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 transition-colors text-white px-6 py-3 rounded-lg font-semibold text-lg inline-flex items-center justify-center shadow-lg">
                            Daftar Sekarang
                        </a>
                        <a href="{{ route('login') }}" class="border-2 border-white/70 hover:bg-white hover:text-blue-600 transition-colors text-white px-6 py-3 rounded-lg font-semibold text-lg inline-flex items-center justify-center">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION 2: TENTANG MYPET (Deskripsi Singkat) --}}
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Tentang MyPet</h2>
                <p class="text-gray-600 text-lg">
                    Kami adalah penyedia layanan grooming hewan terpercaya dengan pengalaman lebih dari 10 tahun. Komitmen kami adalah memberikan perawatan terbaik untuk hewan kesayangan Anda.
                </p>
            </div>
        </section>

        {{-- SECTION 3: KEUNGGULAN (3 Kolom Card) --}}
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 pb-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                {{-- Keunggulan 1 --}}
                <div class="p-6 bg-white rounded-xl shadow-md text-center border-t-4 border-blue-500">
                    <div class="inline-flex p-3 bg-blue-100 rounded-full text-blue-600 mb-4">
                        <i class="fas fa-certificate text-2xl"></i> {{-- Icon: Sertifikat/Grooming --}}
                    </div>
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Grooming Profesional</h4>
                    <p class="text-gray-600 text-sm">Tim groomer berpengalaman dengan sertifikasi internasional untuk perawatan optimal hewan Anda.</p>
                </div>
                
                {{-- Keunggulan 2 --}}
                <div class="p-6 bg-white rounded-xl shadow-md text-center border-t-4 border-green-500">
                    <div class="inline-flex p-3 bg-green-100 rounded-full text-green-600 mb-4">
                        <i class="fas fa-heart text-2xl"></i> {{-- Icon: Hati/Kasih --}}
                    </div>
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Perawatan Penuh Kasih</h4>
                    <p class="text-gray-600 text-sm">Kami mengerjakan setiap hewan dengan penuh kasih sayang dan kesabaran seperti hewan kami sendiri.</p>
                </div>

                {{-- Keunggulan 3 --}}
                <div class="p-6 bg-white rounded-xl shadow-md text-center border-t-4 border-purple-500">
                    <div class="inline-flex p-3 bg-purple-100 rounded-full text-purple-600 mb-4">
                        <i class="fas fa-cogs text-2xl"></i> {{-- Icon: Fasilitas/Modern --}}
                    </div>
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Fasilitas Modern</h4>
                    <p class="text-gray-600 text-sm">Dilengkapi dengan peralatan modern dan standar kebersihan tinggi untuk kenyamanan hewan Anda.</p>
                </div>

            </div>
        </section>

        {{-- SECTION 4: LAYANAN KAMI (Daftar Layanan/Services) --}}
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Layanan Kami</h2>
                <p class="text-gray-600">Berbagai layanan grooming profesional untuk hewan kesayangan Anda</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                
                {{-- Layanan 1: Grooming Anjing --}}
                <a href="{{ route('create') }}" class="block group">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <img src="https://placehold.co/600x400/81C784/FFF?text=Grooming+Anjing" alt="Grooming Anjing" class="w-full h-40 object-cover transform group-hover:scale-105 transition-transform duration-300">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg text-gray-800 mb-1 group-hover:text-blue-600 transition-colors">Grooming Anjing</h4>
                            <p class="text-gray-500 text-sm">Perawatan lengkap untuk anjing kesayangan Anda.</p>
                        </div>
                    </div>
                </a>
                
                {{-- Layanan 2: Grooming Kucing --}}
                <a href="{{ route('create') }}" class="block group">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <img src="https://placehold.co/600x400/9FA8DA/FFF?text=Grooming+Kucing" alt="Grooming Kucing" class="w-full h-40 object-cover transform group-hover:scale-105 transition-transform duration-300">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg text-gray-800 mb-1 group-hover:text-blue-600 transition-colors">Grooming Kucing</h4>
                            <p class="text-gray-500 text-sm">Perawatan khusus untuk kucing dengan bulu yang tebal.</p>
                        </div>
                    </div>
                </a>
                
                {{-- Layanan 3: Perawatan Kuku --}}
                <a href="{{ route('create') }}" class="block group">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <img src="https://placehold.co/600x400/A5D6A7/FFF?text=Perawatan+Kuku" alt="Perawatan Kuku" class="w-full h-40 object-cover transform group-hover:scale-105 transition-transform duration-300">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg text-gray-800 mb-1 group-hover:text-blue-600 transition-colors">Perawatan Kuku</h4>
                            <p class="text-gray-500 text-sm">Pemotongan dan perawatan kuku yang aman.</p>
                        </div>
                    </div>
                </a>
                
                {{-- Layanan 4: Mandi & Spa --}}
                <a href="{{ route('create') }}" class="block group">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <img src="https://placehold.co/600x400/C5CAE9/FFF?text=Mandi+&+Spa" alt="Mandi & Spa" class="w-full h-40 object-cover transform group-hover:scale-105 transition-transform duration-300">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg text-gray-800 mb-1 group-hover:text-blue-600 transition-colors">Mandi & Spa</h4>
                            <p class="text-gray-500 text-sm">Layanan mandi dan spa untuk relaksasi hewan.</p>
                        </div>
                    </div>
                </a>
                
            </div>
        </section>
        
    </main>

    {{-- 3. MEMANGGIL ELEMEN FOOTER --}}
    @include('layouts.footer')

    {{-- 4. Tombol Chat Opsional (sesuai gambar footer) --}}
    <div class="fixed bottom-6 right-6">
        <a href="#" class="bg-black text-white px-5 py-3 rounded-full flex items-center shadow-2xl hover:bg-gray-800 transition-colors">
            <i class="fas fa-comments mr-2"></i> Talk with Us
        </a>
    </div>

</body>
</html>