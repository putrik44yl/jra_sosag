@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Sarana</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $sarana->id_sarana }}</p>
            <p><strong>Nama Sarana:</strong> {{ $sarana->nama_sarana }}</p>
            <p><strong>Jumlah:</strong> {{ $sarana->jumlah }}</p>
            <p><strong>Kondisi:</strong> {{ ucfirst($sarana->kondisi) }}</p>
            <p><strong>Keterangan:</strong> {{ $sarana->keterangan ?? '-' }}</p>
            <p><strong>Dibuat:</strong> {{ $sarana->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Terakhir Diperbarui:</strong> {{ $sarana->updated_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.sarana.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    <a href="{{ route('admin.sarana.edit', $sarana->id_sarana) }}" class="btn btn-warning mt-3">Edit</a>
</div>
@endsection
