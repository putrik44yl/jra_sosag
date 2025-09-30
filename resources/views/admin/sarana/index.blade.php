@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Sarana</h2>

    <a href="{{ route('admin.sarana.create') }}" class="btn btn-primary mb-3">+ Tambah Sarana</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Sarana</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sarana as $data)
                <tr>
                    <td>{{ $data->id_sarana }}</td>
                    <td>{{ $data->nama_sarana }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ ucfirst($data->kondisi) }}</td>
                    <td>{{ $data->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.sarana.show', $data->id_sarana) }}" class="btn btn-icon btn-primary" title="Detail">
                            <i class="bx bx-show"></i>
                        </a>
                        <a href="{{ route('admin.sarana.edit', $data->id_sarana) }}" class="btn btn-icon btn-warning" title="Edit">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route('admin.sarana.destroy', $data->id_sarana) }}" method="POST" class="d-inline">
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
                    <td colspan="6" class="text-center">Belum ada data sarana.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
