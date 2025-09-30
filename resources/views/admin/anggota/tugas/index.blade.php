@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Tugas</h2>

    <a href="{{ route('anggota.tugas.create') }}" class="btn btn-primary mb-3">+ Tambah Tugas</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Tugas</th>
                <th>Deskripsi</th>
                <th>Bulan</th>
                <th>Status</th>
                <th>Ditugaskan Untuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tugas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_tugas }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>
                        <span class="badge {{ $item->status == 'selesai' ? 'bg-success' : 'bg-warning' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('anggota.tugas.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('anggota.tugas.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada tugas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
