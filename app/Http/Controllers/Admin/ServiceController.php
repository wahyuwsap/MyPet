<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // Tampilkan semua layanan
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    // Form tambah layanan
    public function create()
    {
        return view('admin.services.create');
    }

    // Simpan layanan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Service::create($request->only(['name', 'description', 'price']));

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Form edit layanan
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    // Update layanan
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $service->update($request->only(['name', 'description', 'price']));

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    // Hapus layanan
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
