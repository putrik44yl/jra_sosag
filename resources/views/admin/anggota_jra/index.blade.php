@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Anggota JRA</h2>

    <a href="{{ route('admin.anggota_jra.create') }}" class="btn btn-primary mb-3">+ Tambah Anggota</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
                <th>Bulan Daftar</th>
                <th>Status Keaktifan</th>
                <th>Status Keanggotaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggota as $data)
                <tr>
                    <td>{{ $data->id_anggota }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->no_telp }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->tgl_daftar }}</td>
                    <td>{{ $data->bln_daftar }}</td>
                    <td>{{ ucfirst($data->status_keaktifan) }}</td>
                    <td>{{ ucfirst($data->status_keanggotaan) }}</td>
                    <td>
                        <a href="{{ route('admin.anggota_jra.show', $data->id_anggota) }}" class="btn btn-icon btn-primary" title="Detail">
                            <i class="bx bx-show"></i>
                        </a>
                        <a href="{{ route('admin.anggota_jra.edit', $data->id_anggota) }}" class="btn btn-icon btn-warning" title="Edit">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route('admin.anggota_jra.destroy', $data->id_anggota) }}" method="POST" class="d-inline">
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
                    <td colspan="9" class="text-center">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
