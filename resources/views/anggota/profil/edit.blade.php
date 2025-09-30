@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Edit Profil</h2>

    <form action="{{ route('anggota.profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $profil->nama_lengkap) }}" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $profil->alamat) }}">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $profil->no_hp) }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $profil->tanggal_lahir) }}">
        </div>

        <div class="mb-3">
            <label>Foto</label><br>
            @if($profil->foto)
                <img src="{{ asset('storage/' . $profil->foto) }}" alt="Foto Profil" width="100"><br><br>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('anggota.profil.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
