@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">Detail Pemulasaraan</h4>
            <a href="{{ route('admin.pemulasaraan.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Kembali
            </a>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="200">ID Pemulasaraan</th>
                    <td>{{ $pemulasaraan->id_pemulasaraan }}</td>
                </tr>
                <tr>
                    <th>Nama Almarhum</th>
                    <td>{{ $pemulasaraan->nama_almarhum }}</td>
                </tr>
                <tr>
                    <th>Tanggal Permintaan</th>
                    <td>{{ $pemulasaraan->tgl_permintaan }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pemulasaraan</th>
                    <td>{{ $pemulasaraan->tgl_pemulasaraan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge 
                            @if($pemulasaraan->status=='menunggu') bg-warning
                            @elseif($pemulasaraan->status=='berjalan') bg-info
                            @elseif($pemulasaraan->status=='selesai') bg-success
                            @else bg-danger
                            @endif
                        ">
                            {{ ucfirst($pemulasaraan->status) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $pemulasaraan->lokasi ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $pemulasaraan->keterangan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $pemulasaraan->created_at }}</td>
                </tr>
                <tr>
                    <th>Diperbarui Pada</th>
                    <td>{{ $pemulasaraan->updated_at }}</td>
                </tr>
            </table>

        </div>
    </div>

</div>
@endsection
