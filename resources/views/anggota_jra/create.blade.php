@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Anggota Baru</h2>

    <form action="{{ route('anggota_jra.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anggota</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telp</label>
            <input type="text" name="no_telp" class="form-control">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
            <input type="date" name="tgl_daftar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="bln_daftar" class="form-label">Bulan Daftar</label>
            <input type="text" name="bln_daftar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status_keaktifan" class="form-label">Status Keaktifan</label>
            <select name="status_keaktifan" class="form-select" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status_keanggotaan" class="form-label">Status Keanggotaan</label>
            <select name="status_keanggotaan" class="form-select" required>
                <option value="baru">Baru</option>
                <option value="lama">Lama</option>
                <option value="berhenti">Berhenti</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('anggota_jra.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
