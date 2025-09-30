@extends('layouts.anggota')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="text-center mb-4">
        <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('admin/assets/img/avatars/8.png') }}" class="rounded-circle" width="100" height="100" alt="Admin Foto">
        <h3 class="mt-3">Selamat Datang di Halaman Anggota 👋</h3>
        <p>{{ Auth::user()->name }}</p>
    </div>

<div class="row">
    <!-- Tugas Bulan Ini -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="bx bx-task fs-1 text-primary"></i>
                <h5 class="mt-2">Tugas Bulan Ini</h5>
                <p class="text-muted">Membantu kegiatan pemulasaraan minggu ke-2.</p>
            </div>
        </div>
    </div>

    <!-- Jadwal Sopir -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="bx bx-calendar fs-1 text-success"></i>
                <h5 class="mt-2">Jadwal Sopir</h5>
                <p class="text-muted">Sopir ambulans: setiap Jumat dan Minggu.</p>
            </div>
        </div>
    </div>
</div>
@endsection
