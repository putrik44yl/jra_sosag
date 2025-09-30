@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Buat Profil</h2>

    <form action="{{ route('anggota.profil.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('anggota.profil.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
