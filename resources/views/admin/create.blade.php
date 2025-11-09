@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jadwal</h2>
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
