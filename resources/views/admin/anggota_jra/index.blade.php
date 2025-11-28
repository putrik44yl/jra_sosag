@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">Daftar Anggota JRA</h4>
            <a href="{{ route('admin.anggota_jra.create') }}" class="btn btn-primary">
                + Tambah Anggota
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
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
                            <th>Foto</th>
                            <th width="120">Aksi</th>
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
                                            @if($data->foto)
                                                <img src="{{ asset('storage/'.$data->foto) }}"
                                                    alt="foto"
                                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.anggota_jra.show', $data->id_anggota) }}"
                                            class="btn btn-sm btn-primary">
                                                <i class="bx bx-show"></i>
                                            </a>

                                            <a href="{{ route('admin.anggota_jra.edit', $data->id_anggota) }}"
                                            class="btn btn-sm btn-warning">
                                                <i class="bx bx-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.anggota_jra.destroy', $data->id_anggota) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Hapus data ini?')"
                                                        class="btn btn-sm btn-danger">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Belum ada data anggota.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection
