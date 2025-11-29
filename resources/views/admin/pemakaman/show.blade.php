@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">Detail Data Pemakaman</h4>
            <a href="{{ route('admin.pemakaman.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Kembali
            </a>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="230">Blok</th>
                    <td>{{ $pemakaman->blok }}</td>
                </tr>

                <tr>
                    <th>Nama Almarhum</th>
                    <td>{{ $pemakaman->nama_almarhum }}</td>
                </tr>

                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>{{ $pemakaman->tempat_tanggal_lahir }}</td>
                </tr>

                <tr>
                    <th>Tanggal Meninggal</th>
                    <td>{{ $pemakaman->tanggal_meninggal }}</td>
                </tr>

                <tr>
                    <th>Keluarga Almarhum</th>
                    <td>{{ $pemakaman->keluarga_almarhum }}</td>
                </tr>

                <tr>
                    <th>Admin Input</th>
                    <td>{{ $pemakaman->user->name ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $pemakaman->created_at }}</td>
                </tr>

                <tr>
                    <th>Diperbarui Pada</th>
                    <td>{{ $pemakaman->updated_at }}</td>
                </tr>

            </table>

        </div>
    </div>

</div>
@endsection
