<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRA Assalaam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center text-center">
        <!-- Judul Aplikasi -->
        <h1 class="fw-bold mb-3 text-primary">JRA Assalaam</h1>
        <p class="lead text-muted">Sistem Informasi Manajemen<br> Anggota, Pemulasaraan, Ambulans, Pengguna Ambulans, Sarana, Prasarana</p>

        <!-- Tombol Aksi -->
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
    </div>

</body>
</html>
