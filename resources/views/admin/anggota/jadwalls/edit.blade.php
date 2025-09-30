@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Edit Jadwal</h2>

    <form action="{{ route('anggota.jadwalls.update', $jadwall->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $jadwall->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" value="{{ $jadwall->hari }}" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $jadwall->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('anggota.jadwalls.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
