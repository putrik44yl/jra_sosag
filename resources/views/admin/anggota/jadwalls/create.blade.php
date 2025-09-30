@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Tambah Jadwal</h2>

    <form action="{{ route('anggota.jadwalls.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('anggota.jadwalls.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
