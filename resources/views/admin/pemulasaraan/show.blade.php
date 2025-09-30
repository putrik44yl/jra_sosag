@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Pemulasaraan</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $pemulasaraan->id }}</p>
            <p><strong>Nama Almarhum:</strong> {{ $pemulasaraan->nama_almarhum }}</p>
            <p><strong>Tanggal Permintaan:</strong> {{ $pemulasaraan->tgl_permintaan }}</p>
            <p><strong>Tanggal Pemulasaraan:</strong> {{ $pemulasaraan->tgl_pemulasaraan }}</p>
            <p><strong>Status:</strong> {{ ucfirst($pemulasaraan->status) }}</p>
            <p><strong>Lokasi:</strong> {{ $pemulasaraan->lokasi }}</p>
            <p><strong>Keterangan:</strong> {{ $pemulasaraan->keterangan }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.pemulasaraan.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('admin.pemulasaraan.edit', $pemulasaraan->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('admin.pemulasaraan.destroy', $pemulasaraan->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
        </form>
    </div>
</div>
@endsection
