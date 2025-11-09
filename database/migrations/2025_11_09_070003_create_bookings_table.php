<?php

// database/migrations/YYYY_MM_DD_HHMMSS_create_bookings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // Kolom dari 'nama_peliharaan'
            $table->string('pet_name'); 
            
            // Kolom dari 'pilihan_layanan' (Foreign Key ke tabel services)
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); 
            
            // Kolom dari 'pilih_tanggal'
            $table->date('booking_date');
            
            // Kolom dari 'jadwal'
            $table->time('booking_time'); 
            
            // Kolom dari 'catatan'
            $table->text('notes')->nullable();
            
            // Kolom tambahan jika menggunakan autentikasi
            // $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};