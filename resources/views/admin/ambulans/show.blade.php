@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">Detail Ambulans</h4>
            <a href="{{ route('admin.ambulans.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Kembali
            </a>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="200">ID Ambulans</th>
                    <td>{{ $ambulans->id_ambulans }}</td>
                </tr>

                <tr>
                    <th>Nama Sopir</th>
                    <td>{{ $ambulans->anggota->nama ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Nama Ambulans</th>
                    <td>{{ $ambulans->nama }}</td>
                </tr>

                <tr>
                    <th>Plat Nomor</th>
                    <td>{{ $ambulans->plat }}</td>
                </tr>

                <tr>
                    <th>Tujuan</th>
                    <td>{{ $ambulans->tujuan }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge
                            @if($ambulans->status == 'tersedia') bg-success
                            @elseif($ambulans->status == 'digunakan') bg-info
                            @elseif($ambulans->status == 'rusak') bg-danger
                            @else bg-secondary
                            @endif
                        ">
                            {{ ucfirst($ambulans->status) }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $ambulans->created_at }}</td>
                </tr>

                <tr>
                    <th>Diperbarui Pada</th>
                    <td>{{ $ambulans->updated_at }}</td>
                </tr>
            </table>

        </div>
    </div>

</div>
@endsection
