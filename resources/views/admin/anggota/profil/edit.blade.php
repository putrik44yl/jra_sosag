@extends('layouts.anggota')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">
        <div class="card-header">
            <h5>Edit Profil</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('anggota.profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" 
                           value="{{ old('nama_lengkap', $profil->nama_lengkap) }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" 
                           value="{{ old('alamat', $profil->alamat) }}">
                </div>

                <div class="mb-3">
                    <label for="no_telepon" class="form-label">Nomor HP</label>
                    <input type="text" name="no_telepon" class="form-control" 
                           value="{{ old('no_telepon', $profil->no_telepon) }}">
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" 
                           value="{{ old('tanggal_lahir', $profil->tanggal_lahir) }}">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    @if($profil->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$profil->foto) }}" alt="Foto Profil" width="120" class="rounded">
                        </div>
                    @endif
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update Profil</button>
                <a href="{{ route('anggota.profil.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

</div>
@endsection
