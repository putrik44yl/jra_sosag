@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Pemulasaraan</h2>

    <a href="{{ route('admin.pemulasaraan.create') }}" class="btn btn-primary mb-3">+ Tambah Pemulasaraan</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Almarhum</th>
                <th>Tanggal Permintaan</th>
                <th>Tanggal Pemulasaraan</th>
                <th>Status</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pemulasaraan as $data)
                <tr>
                    <td>{{ $data->id_pemulasaraan }}</td>
                    <td>{{ $data->nama_almarhum }}</td>
                    <td>{{ $data->tgl_permintaan }}</td>
                    <td>{{ $data->tgl_pemulasaraan }}</td>
                    <td>{{ ucfirst($data->status) }}</td>
                    <td>{{ $data->lokasi }}</td>
                    <td>{{ $data->keterangan }}</td>
                    <td>
                        <a href="{{ route('admin.pemulasaraan.show', $data->id_pemulasaraan) }}" class="btn btn-icon btn-primary" title="Detail">
                            <i class="bx bx-show"></i>
                        </a>
                        <a href="{{ route('admin.pemulasaraan.edit', $data->id_pemulasaraan) }}" class="btn btn-icon btn-warning" title="Edit">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route('admin.pemulasaraan.destroy', $data->id_pemulasaraan) }}" method="POST" class="d-inline">
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
                    <td colspan="8" class="text-center">Belum ada data pemulasaraan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
