{{-- resources/views/layouts/header.blade.php --}}
<header class="bg-white shadow-sm">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6">
        {{-- Logo --}}
        <a href="/" class="text-2xl font-bold text-blue-600">
            My<span class="text-gray-800">Pet</span>
        </a>

        {{-- Menu Navigasi --}}
        <div class="flex items-center space-x-6">
            {{-- Jika user belum login --}}
            @guest
                <a href="{{ route('login') }}" 
                   class="text-gray-800 hover:text-blue-600 transition-colors font-medium">
                    Login
                </a>
                <a href="{{ route('register') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    Daftar
                </a>
            @endguest

            {{-- Jika user sudah login --}}
            @auth
                <a href="{{ route('dashboard') }}" 
                   class="{{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-800 hover:text-blue-600' }} 
                          px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                    Dashboard
                </a>
                <!-- <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                        class="text-red-600 hover:text-red-700 font-medium transition-colors">
                        Logout
                    </button>
                </form> -->
            @endauth

            @auth
            {{-- Tombol Logout --}}
                <a href="#" 
                    id="logout-link" 
                    class="nav-link font-medium hover:text-red-600 transition duration-150">
                    Logout
            </a>
            
            {{-- Formulir Logout Tersembunyi --}}
            {{-- Kita perlu form POST karena Laravel mewajibkan CSRF Token untuk Logout --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
             @endauth

             <script>
                document.getElementById('logout-link').addEventListener('click', function(event) {
                    // Mencegah navigasi langsung
                    event.preventDefault(); 
                    
                    // Menampilkan pop-up konfirmasi
                    const confirmation = confirm('Apakah Anda yakin ingin logout?'); 

                    if (confirmation) {
                        // Jika pengguna menekan 'OK', kirimkan form POST yang tersembunyi
                        document.getElementById('logout-form').submit();
                    }
                    // Jika pengguna menekan 'Cancel', tidak terjadi apa-apa
                });
            </script>
        </div>
    </nav>
</header>
