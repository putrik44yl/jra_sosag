@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Pengguna Sarana</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID Pengguna:</strong> {{ $pengguna->id_pengguna }}</p>
            <p><strong>Nama Anggota:</strong> {{ $pengguna->anggota->nama ?? '-' }}</p>
            <p><strong>Nama Sarana:</strong> {{ $pengguna->sarana->nama_sarana ?? '-' }}</p>
            <p><strong>Tanggal Pakai:</strong> {{ $pengguna->tanggal_pakai }}</p>
            <p><strong>Keterangan:</strong> {{ $pengguna->keterangan ?? '-' }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('pengguna_sarana.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('pengguna_sarana.edit', $pengguna->id_pengguna) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('pengguna_sarana.destroy', $pengguna->id_pengguna) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
        </form>
    </div>
</div>
@endsection
