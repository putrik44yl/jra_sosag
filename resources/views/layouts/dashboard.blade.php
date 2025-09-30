@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="text-center mb-4">
        <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('admin/assets/img/avatars/8.png') }}" class="rounded-circle" width="100" height="100" alt="Admin Foto">
        <h3 class="mt-3">Selamat Datang di Halaman Admin 👋</h3>
        <p>{{ Auth::user()->name }}</p>
    </div>

    <div class="row">
        <!-- Users -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-user fs-1 text-secondary"></i>
                    <h5 class="mt-2">Users</h5>
                    <p class="text-muted">{{ $jumlahUsers ?? 0 }} akun</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Anggota -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-group fs-1 text-success"></i>
                    <h5 class="mt-2">Anggota</h5>
                    <p class="text-muted">{{ $jumlahAnggota ?? 0 }} orang</p>
                    <a href="{{ route('admin.anggota_jra.index') }}" class="btn btn-sm btn-outline-success">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Pemulasaraan -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-spa fs-1 text-primary"></i>
                    <h5 class="mt-2">Pemulasaraan</h5>
                    <p class="text-muted">{{ $jumlahPemulasaraan ?? 0 }} layanan</p>
                    <a href="{{ route('admin.pemulasaraan.index') }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Ambulans -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-car fs-1 text-danger"></i>
                    <h5 class="mt-2">Ambulans</h5>
                    <p class="text-muted">{{ $jumlahAmbulans ?? 0 }} unit</p>
                    <a href="{{ route('admin.ambulans.index') }}" class="btn btn-sm btn-outline-danger">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Pengguna Ambulans -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-user-voice fs-1 text-warning"></i>
                    <h5 class="mt-2">Pengguna Ambulans</h5>
                    <p class="text-muted">{{ $jumlahPenggunaAmbulans ?? 0 }} orang</p>
                    <a href="{{ route('admin.pengguna_ambulans.index') }}" class="btn btn-sm btn-outline-warning">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Sarana -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-package fs-1 text-info"></i>
                    <h5 class="mt-2">Sarana</h5>
                    <p class="text-muted">{{ $jumlahSarana ?? 0 }} item</p>
                    <a href="{{ route('admin.sarana.index') }}" class="btn btn-sm btn-outline-info">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Pengguna Sarana -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-user-check fs-1 text-success"></i>
                    <h5 class="mt-2">Pengguna Sarana</h5>
                    <p class="text-muted">{{ $jumlahPenggunaSarana ?? 0 }} orang</p>
                    <a href="{{ route('admin.pengguna_sarana.index') }}" class="btn btn-sm btn-outline-success">Lihat</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
