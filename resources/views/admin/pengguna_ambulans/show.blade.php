@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Pengguna Ambulans</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $pengguna->id_pengguna_ambulans }}</td>
        </tr>
        <tr>
            <th>Ambulans</th>
            <td>{{ $pengguna->ambulans->nama ?? '-' }} ({{ $pengguna->ambulans->plat ?? '-' }})</td>
        </tr>
        <tr>
            <th>User</th>
            <td>{{ $pengguna->user->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Anggota</th>
            <td>{{ $pengguna->anggota->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tanggal Penggunaan</th>
            <td>{{ $pengguna->tgl_penggunaan }}</td>
        </tr>
        <tr>
            <th>Tujuan</th>
            <td>{{ $pengguna->tujuan }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($pengguna->status) }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.pengguna_ambulans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
