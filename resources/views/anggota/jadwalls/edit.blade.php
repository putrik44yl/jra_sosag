@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Edit Jadwal</h2>
    <form action="{{ route('anggota.jadwalls.update', $jadwall->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" value="{{ $jadwall->kegiatan }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $jadwall->tanggal }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" value="{{ $jadwall->waktu }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" value="{{ $jadwall->lokasi }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
