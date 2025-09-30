@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Profil Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($profil)
        <div class="card">
            <div class="card-body">
                <p><strong>Nama Lengkap:</strong> {{ $profil->nama_lengkap }}</p>
                <p><strong>Alamat:</strong> {{ $profil->alamat ?? '-' }}</p>
                <p><strong>No HP:</strong> {{ $profil->no_hp ?? '-' }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $profil->tanggal_lahir ?? '-' }}</p>
                <p><strong>Foto:</strong></p>
                @if($profil->foto)
                    <img src="{{ asset('storage/' . $profil->foto) }}" alt="Foto Profil" width="150">
                @else
                    <span>Tidak ada foto</span>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('anggota.profil.edit', $profil->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('anggota.profil.destroy', $profil->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Yakin hapus profil?')">Hapus</button>
                </form>
            </div>
        </div>
    @else
        <p>Belum ada profil.</p>
        <a href="{{ route('anggota.profil.create') }}" class="btn btn-primary">Buat Profil</a>
    @endif
</div>
@endsection
