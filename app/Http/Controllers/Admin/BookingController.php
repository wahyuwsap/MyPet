<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('admin.bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required',
            'service_id'  => 'required',
            'tanggal'     => 'required|date',
            'jam'         => 'required',
            'status'      => 'required|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil ditambahkan.');
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id'     => 'required',
            'service_id'  => 'required',
            'tanggal'     => 'required|date',
            'jam'         => 'required',
            'status'      => 'required|string',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil dihapus.');
    }
}
