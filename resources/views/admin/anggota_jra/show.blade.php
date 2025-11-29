@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">Detail Anggota JRA</h4>
            <a href="{{ route('admin.anggota_jra.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Kembali
            </a>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="220">ID Anggota</th>
                    <td>{{ $anggota->id_anggota }}</td>
                </tr>

                <tr>
                    <th>Nama</th>
                    <td>{{ $anggota->nama }}</td>
                </tr>

                <tr>
                    <th>No. Telepon</th>
                    <td>{{ $anggota->no_telp }}</td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>{{ $anggota->alamat }}</td>
                </tr>

                <tr>
                    <th>Tanggal Daftar</th>
                    <td>{{ $anggota->tgl_daftar }}</td>
                </tr>

                <tr>
                    <th>Bulan Daftar</th>
                    <td>{{ $anggota->bln_daftar }}</td>
                </tr>

                <tr>
                    <th>Status Keaktifan</th>
                    <td>
                        <span class="badge
                            @if($anggota->status_keaktifan == 'aktif') bg-success
                            @elseif($anggota->status_keaktifan == 'nonaktif') bg-danger
                            @else bg-secondary
                            @endif
                        ">
                            {{ ucfirst($anggota->status_keaktifan) }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Status Keanggotaan</th>
                    <td>
                        <span class="badge
                            @if($anggota->status_keanggotaan == 'tetap') bg-info
                            @elseif($anggota->status_keanggotaan == 'sementara') bg-warning
                            @else bg-secondary
                            @endif
                        ">
                            {{ ucfirst($anggota->status_keanggotaan) }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Foto</th>
                    <td>
                        @if($anggota->foto)
                            <img src="{{ asset('storage/'.$anggota->foto) }}" 
                                 alt="Foto Anggota" 
                                 style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px;">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $anggota->created_at }}</td>
                </tr>

                <tr>
                    <th>Diperbarui Pada</th>
                    <td>{{ $anggota->updated_at }}</td>
                </tr>

            </table>

        </div>
    </div>

</div>
@endsection
