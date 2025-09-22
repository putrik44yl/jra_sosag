@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Data Pemulasaraan</h2>

    <form action="{{ route('pemulasaraan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_almarhum" class="form-label">Nama Almarhum</label>
            <input type="text" name="nama_almarhum" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tgl_permintaan" class="form-label">Tanggal Permintaan</label>
            <input type="date" name="tgl_permintaan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tgl_pemulasaraan" class="form-label">Tanggal Pemulasaraan</label>
            <input type="date" name="tgl_pemulasaraan" class="form-control">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="menunggu">Menunggu</option>
                <option value="berjalan">Berjalan</option>
                <option value="selesai">Selesai</option>
                <option value="dibatalkan">DIbatalkan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pemulasaraan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
