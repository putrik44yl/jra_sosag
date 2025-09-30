@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Tambah Jadwal</h2>
    <form action="{{ route('anggota.jadwalls.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control">
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
