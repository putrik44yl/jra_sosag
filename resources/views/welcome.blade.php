@extends('layouts.frontend')
@section('title', 'Beranda JRA Assalaam')
@section('content')

<main class="main">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('user/assets/img/jra-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">JRA Assalaam</h1>
                    <p data-aos="fade-up" data-aos-delay="200">
                        Pelayanan Pemulasaraan, Pemakaman, Ambulans dan Sarana Kematian.
                    </p>
                </div>
                <div class="mt-4">
                    @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg me-2">Masuk ke Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>
                    @endauth
                </div>

                <!-- Footer -->
                <footer class="mt-5 text-muted">
                    &copy; {{ date('Y') }} JRA Assalaam. All rights reserved.
                </footer>
                <div class="col-lg-6 hero-img" data-aos="zoom-out">
                    <img src="{{ asset('user/assets/img/hero-img.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ===========================
            DATA PEMAKAMAN
        ============================ -->
        <section id="pemakaman" class="section pt-5">
            <div class="container">
                <div class="section-title">
                    <h2>Data Pemakaman</h2>
                </div>

                @if($pemakaman->count())
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Almarhum</th>
                                <th>Blok</th>
                                <th>Lahir</th>
                                <th>Meninggal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemakaman as $pem)
                                <tr>
                                    <td>{{ $pem->nama_almarhum }}</td>
                                    <td>{{ $pem->blok }}</td>
                                    <td>{{ $pem->tempat_tanggal_lahir }}</td>
                                    <td>{{ $pem->tanggal_meninggal }}</td>
                                    <td>{{ $pem->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Belum ada data pemakaman.</p>
                @endif
            </div>
        </section>



        <!-- ===========================
            DATA ANGGOTA JRA
        ============================ -->
        <section id="anggota" class="section bg-light pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Anggota JRA</h2>
                <p>Daftar anggota yang aktif melayani umat.</p>
            </div>

            @if($anggota->count())
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $a)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $a->foto) }}"
                                        width="60" height="60"
                                        style="object-fit: cover; border-radius: 50%;">
                                </td>
                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->alamat }}</td>
                                <td>{{ $a->status_keaktifan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Belum ada anggota terdaftar.</p>
            @endif
        </div>
    </section>


        <!-- ===========================
            DATA AMBULANS
        ============================ -->
        <section id="ambulan" class="section bg-light pt-5">
            <div class="container">
                <div class="section-title">
                    <h2>Layanan Ambulans</h2>
                </div>

                @if($ambulans->count())
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Merk</th>
                                <th>Plat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambulans as $am)
                                <tr>
                                    <td>{{ $am->merk }}</td>
                                    <td>{{ $am->plat }}</td>
                                    <td>{{ $am->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Belum ada ambulans.</p>
                @endif
            </div>
        </section>

        
        <!-- ===========================
            DATA PEMULASARAAN

        ============================ -->
        <section id="pemulasaraan" class="section bg-light pt-5">
            <div class="container">
                <div class="section-title">
                    <h2>Layanan Pemulasaraan</h2>
                </div>

                @if($pemulasaraan->count())
                    <table class="table table-bordered table-striped">
                        <thead>
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
                            @foreach ($pemulasaraan as $pm)
                                <tr>
                                    <td>{{ $pm->nama_almarhum }}</td>
                                    <td>{{ $pm->tgl_permintaan }}</td>
                                    <td>{{ $pm->tgl_pemulasaraan ?? '-' }}</td>
                                    <td>
                                        @if($pm->status == 'menunggu')
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        @elseif($pm->status == 'berjalan')
                                            <span class="badge bg-info text-dark">Berjalan</span>
                                        @elseif($pm->status == 'selesai')
                                            <span class="badge bg-success">Selesai</span>
                                        @else
                                            <span class="badge bg-danger">Dibatalkan</span>
                                        @endif
                                    </td>
                                    <td>{{ $pm->lokasi ?? '-' }}</td>
                                    <td>{{ $pm->keterangan ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Belum ada data pemulasaraan.</p>
                @endif

            </div>
        </section>



        <!-- ===========================
            DOKUMENTASI FOTO & VIDEO
        ============================ -->


        <section id="galeri" class="section bg-light pt-5">
        <div class="container">
        <div class="section-title">
            <h2>Galeri Kegiatan</h2>
        </div>
        <div class="row gy-4">
            @forelse ($galeri as $g)
                <div class="col-lg-3 col-md-4">
                    <div class="card shadow-sm">
                        @if ($g->tipe == 'foto')
                            <img src="{{ asset('storage/' . $g->file_path) }}" 
                                 class="card-img-top" 
                                 style="height:200px; object-fit:cover;">
                        @else
                            <video class="w-100" controls 
                                   style="height:200px; object-fit:cover;">
                                <source src="{{ asset('storage/' . $g->file_path) }}">
                            </video>
                        @endif
                        <div class="p-3">
                            <h6 class="m-0">{{ $g->judul }}</h6>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada foto atau video.</p>
            @endforelse
         </div>
        </div>
    </section>
    <!-- Contact Section -->
    
    </main> 
@endsection
