<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Form booking untuk user
     */
    public function create()
    {
        $services = Service::all();

        $availableTimes = [
            '09:00', '10:00', '11:00',
            '13:00', '14:00', '15:00'
        ];

        // PENTING: kamu tidak punya folder booking/
        // jadi view yang dipanggil harus: create.blade.php
        return view('create', [
            'services' => $services,
            'availableTimes' => $availableTimes,
        ]);
    }

    /**
     * Simpan booking baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_peliharaan'   => 'required|string|max:255',
            'pilihan_layanan'   => 'required|exists:services,id',
            'pilih_tanggal'     => 'required|date|after_or_equal:today',
            'jadwal'            => [
                'required',
                'date_format:H:i',
                Rule::in(['09:00', '10:00', '11:00', '13:00', '14:00', '15:00']),
            ],
            'catatan'           => 'nullable|string|max:500',
        ]);

        // Simpan ke database
        Booking::create([
            'user_id'       => Auth::id(),
            'pet_name'      => $validatedData['nama_peliharaan'],
            'service_id'    => $validatedData['pilihan_layanan'],
            'booking_date'  => $validatedData['pilih_tanggal'],
            'booking_time'  => $validatedData['jadwal'],
            'notes'         => $validatedData['catatan'],
        ]);

        return redirect()
            ->route('booking.create')
            ->with('success', 'Booking berhasil dibuat!');
    }
}
