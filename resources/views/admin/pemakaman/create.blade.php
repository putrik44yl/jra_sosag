@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold mb-4">Tambah Data Pemakaman</h4>

    <div class="card p-4">
        <form action="{{ route('admin.pemakaman.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Blok</label>
                <input type="text" name="blok" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Almarhum</label>
                <input type="text" name="nama_almarhum" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tempat, Tanggal Lahir</label>
                <input type="text" name="tempat_tanggal_lahir" class="form-control" required placeholder="Bandung, 12 Juni 1980">
            </div>

            <div class="mb-3">
                <label>Tanggal Meninggal</label>
                <input type="date" name="tanggal_meninggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Keluarga Almarhum</label>
                <input type="text" name="keluarga_almarhum" class="form-control">
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.pemakaman.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</div>
@endsection
