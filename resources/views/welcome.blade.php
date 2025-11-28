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

                <div class="row gy-4">
                    @forelse ($pemakaman as $pem)
                        <div class="col-lg-4">
                            <div class="card p-3 shadow-sm">
                                <h5>{{ $pem->nama_almarhum }}</h5>
                                <p class="mb-1"><strong>Blok:</strong> {{ $pem->blok }}</p>
                                <p class="mb-1"><strong>Lahir:</strong> {{ $pem->tempat_tanggal_lahir }}</p>
                                <p class="mb-1"><strong>Meninggal:</strong> {{ $pem->tanggal_meninggal }}</p>
                                <p class="text-muted small">{{ $pem->keterangan }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada data pemakaman.</p>
                    @endforelse
                </div>
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

                <div class="row gy-4">
                    @forelse ($anggota as $a)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card p-3 text-center shadow-sm">

                                <img src="{{ asset('storage/' . $a->foto) }}"
                                     class="rounded-circle mb-3"
                                     width="90" height="90"
                                     style="object-fit: cover">

                                <h5>{{ $a->nama }}</h5>
                                <p class="text-muted small">{{ $a->alamat }}</p>
                                <span class="badge bg-success">{{ $a->status_keaktifan }}</span>

                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada anggota terdaftar.</p>
                    @endforelse
                </div>
            </div>
        </section>


        <!-- ===========================
            DATA PEMULASARAAN
        ============================ -->
        <section id="pemulasaraan" class="section pt-5">
            <div class="container">
                <div class="section-title">
                    <h2>Data Pemulasaraan</h2>
                    <p>Layanan pemulasaraan jenazah JRA Assalaam.</p>
                </div>

                <div class="row gy-4">
                    @forelse ($pemulasaraan as $p)
                        <div class="col-lg-4">
                            <div class="card p-3 shadow-sm">
                                <h5>{{ $p->nama_jenazah }}</h5>
                                <p><strong>Waktu:</strong> {{ $p->waktu }}</p>
                                <p><strong>Petugas:</strong> {{ $p->petugas }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada data pemulasaraan.</p>
                    @endforelse
                </div>
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

                <div class="row gy-4">
                    @forelse ($ambulans as $am)
                        <div class="col-lg-4">
                            <div class="card p-3 shadow-sm">
                                <h5>{{ $am->merk }}</h5>
                                <p><strong>Plat:</strong> {{ $am->plat }}</p>
                                <p><strong>Status:</strong> {{ $am->status }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada ambulans.</p>
                    @endforelse
                </div>
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
    <section id="contact" class="contact section light-background">

    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
    </div>

    <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-4">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p>Jl. Sasak Gantung No.10</p>
                    </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>081572532589</p>
                    </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>jraassalaam@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">

                <!-- Alert sukses -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>

                            <button type="submit">Send Message</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </main> 
@endsection
