@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Ambulans</h2>

    <a href="{{ route('ambulans.create') }}" class="btn btn-primary mb-3">+ Tambah Data Ambulans</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Sopir</th>
                <th>Nama Ambulan</th>
                <th>Plat</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ambulans as $data)
                <tr>
                    <td>{{ $data->id_ambulans }}</td>
                    <td>{{ $data->anggota->nama ?? '-' }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->plat }}</td>
                    <td>{{ $data->tujuan }}</td>
                    <td>{{ ucfirst($data->status) }}</td>
                    <td>
                        <a href="{{ route('ambulans.show', $data->id_ambulans) }}" class="btn btn-icon btn-primary" title="Detail">
                            <i class="bx bx-show"></i>
                        </a>
                        <a href="{{ route('ambulans.edit', $data->id_ambulans) }}" class="btn btn-icon btn-warning" title="Edit">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route('ambulans.destroy', $data->id_ambulans) }}" method="POST" class="d-inline">
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
                    <td colspan="7" class="text-center">Belum ada data ambulans.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
