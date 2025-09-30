@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Pengguna Ambulans</h2>

    <a href="{{ route('admin.pengguna_ambulans.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Ambulans</th>
                <th>User</th>
                <th>Anggota</th>
                <th>Tgl Penggunaan</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengguna as $data)
                <tr>
                    <td>{{ $data->id_pengguna_ambulans }}</td>
                    <td>{{ $data->ambulans->nama ?? '-' }}</td>
                    <td>{{ $data->user->name ?? '-' }}</td>
                    <td>{{ $data->anggota->nama ?? '-' }}</td>
                    <td>{{ $data->tgl_penggunaan }}</td>
                    <td>{{ $data->tujuan }}</td>
                    <td>{{ ucfirst($data->status) }}</td>
                    <td>
                        <a href="{{ route('admin.pengguna_ambulans.show', $data->id_pengguna_ambulans) }}" class="btn btn-icon btn-primary" title="Detail">
                            <i class="bx bx-show"></i>
                        </a>
                        <a href="{{ route('admin.pengguna_ambulans.edit', $data->id_pengguna_ambulans) }}" class="btn btn-icon btn-warning" title="Edit">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route('admin.pengguna_ambulans.destroy', $data->id_pengguna_ambulans) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')   
                            <button class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Yakin hapus data ini?')">
                                <i class="bx bx-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data penggunaan ambulans.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
