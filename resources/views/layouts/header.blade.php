{{-- 
    Header ini dibuat 'absolute' agar menimpa gambar hero di dashboard/landing page.
    'z-10' memastikannya berada di lapisan atas.
    Warna disesuaikan menjadi putih (bg-white/90) agar sesuai dengan tampilan 'myPet' yang cerah.
--}}
<header class="absolute top-0 left-0 right-0 z-10 bg-white/90 backdrop-blur-sm border-b border-gray-200">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        
        {{-- Logo myPet --}}
        <a href="{{ url('/') }}" class="text-3xl font-extrabold">
            {{-- Menggunakan warna biru #3b82f6 (blue-500) dan teks hitam untuk simulasi logo di gambar --}}
            <span class="text-blue-500 italic font-serif">my</span><span class="text-gray-800 italic font-serif">Pet</span>
        </a>
        
        {{-- Navigasi Otomatis (Login/Daftar/Logout) --}}
        <div class="flex items-center space-x-4">
            
            {{-- Jika user BELUM login: Tampilkan tombol Login dan Daftar --}}
            @guest
                {{-- Tombol Login (Teks) --}}
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition-colors font-medium">
                    Login
                </a>
                
                {{-- Tombol Daftar (Biru, seperti pada gambar) --}}
                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    Daftar
                </a>
            @endguest

            {{-- Jika user SUDAH login: Tampilkan tombol Logout --}}
            @auth
                {{-- Anda bisa menambahkan link ke Profil atau Dashboard di sini --}}
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition-colors font-medium">
                    Dashboard
                </a>

                {{-- Form Logout --}}
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</header>