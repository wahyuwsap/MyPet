<footer class="bg-white border-t border-gray-200 mt-16 pt-10 pb-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8 pb-8">
            
            {{-- Bagian 1: Logo dan Deskripsi --}}
            <div class="col-span-2 md:col-span-1">
                {{-- Logo MyPet --}}
                <a href="{{ url('/') }}" class="text-3xl font-extrabold mb-4 inline-block">
                    <span class="text-blue-500 italic font-serif">my</span><span class="text-gray-800 italic font-serif">Pet</span>
                </a>
                
                {{-- Deskripsi --}}
                <p class="text-gray-600 text-sm mt-2 mb-4 pr-10">
                    Layanan grooming profesional untuk hewan kesayangan Anda. Kami menyediakan perawatan terbaik dengan tim yang berpengalaman dan fasilitas modern.
                </p>
                
                {{-- Social Media Icons --}}
                <div class="flex space-x-4 text-lg">
                    <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">
                        <i class="fab fa-facebook-f"></i> {{-- Pastikan Anda menggunakan Font Awesome --}}
                    </a>
                    <a href="#" class="text-pink-600 hover:text-pink-800 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-blue-400 hover:text-blue-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            
            {{-- Bagian 2: Layanan --}}
            <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Layanan</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">Grooming Anjing</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">Grooming Kucing</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">Perawatan Kuku</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">Mandi & Spa</a></li>
                    {{-- Link ini sebaiknya mengarah ke halaman CRUD Services atau detail layanan --}}
                </ul>
            </div>
            
            {{-- Bagian 3 & 4 (Digabung): Kontak --}}
            <div class="col-span-2 md:col-span-1">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Kontak</h4>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-phone mr-3 w-4 text-blue-500"></i> {{-- Ikon Telepon --}}
                        (021) 123-4567
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-envelope mr-3 w-4 text-blue-500"></i> {{-- Ikon Email --}}
                        info@mypet.com
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-map-marker-alt mr-3 w-4 text-blue-500"></i> {{-- Ikon Lokasi --}}
                        Jakarta, Indonesia
                    </li>
                </ul>
            </div>
            
        </div>
        
        {{-- Pembatas --}}
        <hr class="my-6 border-gray-200">
        
        {{-- Bagian Hak Cipta --}}
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>&copy; 2024 MyPet. Semua hak dilindungi.</p>
            <p>Website By <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Kelompok Anda</a></p>
        </div>
    </div>
</footer>