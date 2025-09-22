@extends('layouts.dashboard_anggota')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h3>Edit Profil</h3>

    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Foto Profil</label><br>
            <img src="{{ $user->foto ? asset('storage/'.$user->foto) : asset('admin/assets/img/avatars/8.png') }}" 
                 class="rounded-circle mb-2" width="80" height="80">
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('profil.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
