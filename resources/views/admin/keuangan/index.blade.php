@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Data Keuangan</h3>
        <a href="{{ route('admin.keuangan.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Data
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Tanggal</th>
                        <th>Jumlah (Rp)</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($keuangans as $keuangan)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $keuangan->user->name ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($keuangan->tanggal)->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $keuangan->keterangan ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $keuangan->status == 'Lunas' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $keuangan->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.keuangan.edit', $keuangan->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('admin.keuangan.destroy', $keuangan->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data keuangan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
