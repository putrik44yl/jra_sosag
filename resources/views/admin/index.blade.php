@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="mb-4">Hasil Pencarian: <strong>{{ $q }}</strong></h4>
    <div class="card mb-4">
        <div class="card-header">
            <strong>Pemulasaraan</strong>
        </div>
        <div class="card-body">
            @if($pemulasaraan->count() == 0)
                <p class="text-muted">Tidak ada data pemulasaraan ditemukan.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Almarhum</th>
                                <th>Tanggal Permintaan</th>
                                <th>Tanggal Pemulasaraan</th>
                                <th>Status</th>
                                <th>Lokasi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemulasaraan as $p)
                            <tr>
                                <td>{{ $p->nama_almarhum }}</td>
                                <td>{{ $p->tgl_permintaan }}</td>
                                <td>{{ $p->tgl_pemulasaraan }}</td>
                                <td>{{ $p->status }}</td>
                                <td>{{ $p->lokasi }}</td>
                                <td>{{ $p->keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    {{-- ANGGOTA --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Data Anggota</strong>
        </div>
        <div class="card-body">
            @if($anggota->count() == 0)
                <p class="text-muted">Tidak ada data anggota ditemukan.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Bulan Daftar</th>
                                <th>Status Keaktifan</th>
                                <th>Status Keanggotaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggota as $a)
                            <tr>
                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->no_telp }}</td>
                                <td>{{ $a->alamat }}</td>
                                <td>{{ $a->tgl_daftar }}</td>
                                <td>{{ $a->bln_daftar }}</td>
                                <td>{{ $a->status_keaktifan }}</td>
                                <td>{{ $a->status_keanggotaan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    {{-- AMBULANS --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Ambulans</strong>
        </div>
        <div class="card-body">
            @if($ambulans->count() == 0)
                <p class="text-muted">Tidak ada data ambulans ditemukan.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Plat</th>
                                <th>Tujuan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ambulans as $am)
                            <tr>
                                <td>{{ $am->nama }}</td>
                                <td>{{ $am->plat }}</td>
                                <td>{{ $am->tujuan }}</td>
                                <td>{{ $am->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
