@extends('layouts.anggota')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="text-center mb-4">
        <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('admin/assets/img/avatars/8.png') }}"
             class="rounded-circle shadow-sm" width="100" height="100" alt="Foto Anggota">
        <h3 class="mt-3">Selamat Datang, {{ Auth::user()->name }} 👋</h3>
        <p class="text-muted">Halaman Dashboard Anggota</p>
    </div>

    <div class="row">
        <!-- Profil -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 bg-primary text-white">
                <div class="card-body text-center">
                    <i class="bx bx-user fs-1"></i>
                    <h5 class="mt-2">Profil Saya</h5>
                    <p class="fs-6">{{ $profil ? 'Lengkap' : 'Belum Lengkap' }}</p>
                    <a href="{{ route('anggota.profil.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Jadwal Sopir -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body text-center">
                    <i class="bx bx-calendar fs-1"></i>
                    <h5 class="mt-2">Jadwal Sopir</h5>
                    <p class="fs-4">{{ $jumlahJadwal }}</p>
                    <a href="{{ route('anggota.jadwalls.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Tugas Bulan Ini -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 bg-info text-white">
                <div class="card-body text-center">
                    <i class="bx bx-task fs-1"></i>
                    <h5 class="mt-2">Tugas Bulan Ini</h5>
                    <p class="fs-4">{{ $jumlahTugas }}</p>
                    <a href="{{ route('anggota.tugas.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
