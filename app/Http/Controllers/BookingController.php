<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // Asumsi Anda punya model Service
use App\Models\Booking; // Asumsi Anda punya model Booking
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    /**
     * Menampilkan formulir untuk membuat booking baru.
     *
     * @return \Illuminate\View\View
     */
    // app/Http/Controllers/BookingController.php

    public function create()
    {
        // Ambil data layanan, dll.
        $services = Service::all(); 
        $availableTimes = ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00'];

        // Pastikan string ini cocok: 'folder.file'
        return view('create', [
            'services' => $services,
            'availableTimes' => $availableTimes,
        ]);
    }

    /**
     * Menyimpan booking baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        // Sesuaikan rule validasi dengan skema database Anda
        $validatedData = $request->validate([
            'nama_peliharaan' => 'required|string|max:255',
            'pilihan_layanan' => 'required|exists:services,id', // Pastikan ID layanan ada di tabel services
            'pilih_tanggal' => 'required|date|after_or_equal:today',
            'jadwal' => [
                'required',
                'date_format:H:i',
                // Contoh rule sederhana, aslinya harus cek ketersediaan di DB
                Rule::in(['09:00', '10:00', '11:00', '13:00', '14:00', '15:00']), 
            ],
            'catatan' => 'nullable|string|max:500',
        ], [
            // Pesan error kustom (Opsional)
            'pilihan_layanan.exists' => 'Pilihan layanan tidak valid.',
            'pilih_tanggal.after_or_equal' => 'Tanggal booking harus hari ini atau di masa depan.',
        ]);

        try {
            // 2. Simpan Data ke Database
            $booking = new Booking();
            $booking->pet_name = $validatedData['nama_peliharaan'];
            $booking->service_id = $validatedData['pilihan_layanan'];
            $booking->booking_date = $validatedData['pilih_tanggal'];
            $booking->booking_time = $validatedData['jadwal'];
            $booking->notes = $validatedData['catatan'];
            // Asumsi: Jika Anda menggunakan autentikasi, Anda bisa menambahkan user_id
            // $booking->user_id = auth()->id(); 
            $booking->save();

            // 3. Redirect dengan pesan sukses
            return redirect()->route('create')->with('success', 'Booking berhasil dibuat!');

        } catch (\Exception $e) {
            // Tangani error jika terjadi (misalnya database error)
            return back()->withInput()->withErrors(['error' => 'Gagal membuat booking. Silakan coba lagi.']);
        }
    }
}