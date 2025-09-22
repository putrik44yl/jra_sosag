@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Pengguna Sarana</h2>

    <a href="{{ route('pengguna_sarana.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Nama Sarana</th>
                <th>Tanggal Pakai</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengguna as $data)
                <tr>
                    <td>{{ $data->id_pengguna }}</td>
                    <td>{{ $data->anggota->nama ?? '-' }}</td>
                    <td>{{ $data->sarana->nama_sarana ?? '-' }}</td>
                    <td>{{ $data->tanggal_pakai }}</td>
                    <td>{{ $data->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pengguna_sarana.show', $data->id_pengguna) }}" class="btn btn-icon btn-primary" title="Detail">
                            <i class="bx bx-show"></i>
                        </a>
                        <a href="{{ route('pengguna_sarana.edit', $data->id_pengguna) }}" class="btn btn-icon btn-warning" title="Edit">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route('pengguna_sarana.destroy', $data->id_pengguna) }}" method="POST" class="d-inline">
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
                    <td colspan="6" class="text-center">Belum ada data penggunaan sarana.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
