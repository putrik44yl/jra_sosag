@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Ambulans</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $ambulans->id_ambulans }}</td>
        </tr>
        <tr>
            <th>Anggota</th>
            <td>{{ $ambulans->anggota->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nama Sopir</th>
            <td>{{ $ambulans->nama }}</td>
        </tr>
        <tr>
            <th>Plat</th>
            <td>{{ $ambulans->plat }}</td>
        </tr>
        <tr>
            <th>Tujuan</th>
            <td>{{ $ambulans->tujuan }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($ambulans->status) }}</td>
        </tr>
    </table>

    <a href="{{ route('ambulans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
