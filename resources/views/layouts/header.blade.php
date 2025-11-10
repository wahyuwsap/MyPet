{{-- resources/views/layouts/header.blade.php --}}
<header class="bg-white shadow-sm">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6">
        {{-- Logo --}}
        @auth
            {{-- Jika sudah login, logo mengarah sesuai role --}}
            @if (auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-blue-600">
            My<span class="text-gray-800">Pet</span>
            </a>
            @else
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-blue-600">
            My<span class="text-gray-800">Pet</span>
            </a>
            @endif
        @else
            {{-- Jika belum login, logo mengarah ke halaman utama --}}
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                My<span class="text-gray-800">Pet</span>
            </a>
        @endauth

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
                {{-- Link Dashboard sesuai role --}}
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" 
                       class="{{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-800 hover:text-blue-600' }} 
                              px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" 
                       class="{{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-800 hover:text-blue-600' }} 
                              px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                        Dashboard
                    </a>
                @endif

                {{-- Menu Profil --}}
                <a href="{{ route('profile.edit') }}" 
                   class="{{ request()->routeIs('profile.edit') ? 'bg-blue-100 text-blue-700' : 'text-gray-800 hover:text-blue-600' }} 
                          px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                    Profil
                </a>

                {{-- Tombol Logout --}}
                <a href="#" 
                    id="logout-link" 
                    class="font-medium hover:text-red-600 transition duration-150">
                    Logout
                </a>

                {{-- Form Logout tersembunyi --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </div>
    </nav>
</header>

{{-- Script Logout --}}
<script>
    document.getElementById('logout-link')?.addEventListener('click', function(event) {
        event.preventDefault();
        if (confirm('Apakah Anda yakin ingin logout?')) {
            document.getElementById('logout-form').submit();
        }
    });
</script>
