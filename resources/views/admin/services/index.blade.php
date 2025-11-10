@extends('layouts.app')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Layanan</h2>
        <a href="{{ route('admin.services.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
           + Tambah Layanan
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 border-b">No</th>
                    <th class="py-3 px-4 border-b">Nama Layanan</th>
                    <th class="py-3 px-4 border-b">Deskripsi</th>
                    <th class="py-3 px-4 border-b">Harga</th>
                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $index => $service)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 font-medium text-gray-800">{{ $service->nama_layanan }}</td>
                    <td class="py-2 px-4 text-gray-600">{{ Str::limit($service->deskripsi, 60) }}</td>
                    <td class="py-2 px-4 text-gray-700">Rp {{ number_format($service->harga, 0, ',', '.') }}</td>
                    <td class="py-2 px-4 text-center">
                        <a href="{{ route('admin.services.edit', $service->id) }}" 
                           class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus layanan ini?')" 
                                    class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">Belum ada layanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
