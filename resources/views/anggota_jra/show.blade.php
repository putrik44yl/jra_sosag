@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Anggota</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID Anggota:</strong> {{ $anggota->id_anggota }}</p>
            <p><strong>Nama:</strong> {{ $anggota->nama }}</p>
            <p><strong>No. Telp:</strong> {{ $anggota->no_telp }}</p>
            <p><strong>Alamat:</strong> {{ $anggota->alamat }}</p>
            <p><strong>Tanggal Daftar:</strong> {{ $anggota->tgl_daftar }}</p>
            <p><strong>Bulan Daftar:</strong> {{ $anggota->bln_daftar }}</p>
            <p><strong>Status Keaktifan:</strong> {{ ucfirst($anggota->status_keaktifan) }}</p>
            <p><strong>Status Keanggotaan:</strong> {{ ucfirst($anggota->status_keanggotaan) }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('anggota_jra.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('anggota_jra.edit', $anggota->id_anggota) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('anggota_jra.destroy', $anggota->id_anggota) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
        </form>
    </div>
</div>
@endsection
