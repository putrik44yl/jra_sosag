@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold mb-4">Data Pemakaman</h4>

    <a href="{{ route('admin.pemakaman.create') }}" class="btn btn-primary mb-3">
        + Tambah Data Pemakaman
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Blok</th>
                        <th>Nama Almarhum</th>
                        <th>TTL</th>
                        <th>Tanggal Meninggal</th>
                        <th>Keluarga</th>
                        <th>Admin Input</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->blok }}</td>
                        <td>{{ $item->nama_almarhum }}</td>
                        <td>{{ $item->tempat_tanggal_lahir }}</td>
                        <td>{{ $item->tanggal_meninggal }}</td>
                        <td>{{ $item->keluarga_almarhum }}</td>
                        <td>{{ $item->user->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.pemakaman.show', $item->id) }}"
                            class="btn btn-sm btn-primary">
                                Lihat
                            </a>

                            <a href="{{ route('admin.pemakaman.edit', $item->id) }}"
                            class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.pemakaman.destroy', $item->id) }}"
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
