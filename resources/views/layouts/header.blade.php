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
                <a href="{{ route('bookings.index') }}" 
                   class="{{ request()->routeIs('bookings.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-800 hover:text-blue-600' }} 
                          px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                    Booking
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                        class="text-red-600 hover:text-red-700 font-medium transition-colors">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</header>
