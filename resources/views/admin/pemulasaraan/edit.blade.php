@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Data Pemulasaraan</h2>

    <form action="{{ route('adminn.pemulasaraan.update', $pemulasaraan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_almarhum" class="form-label">Nama Almarhum</label>
            <input type="text" name="nama_almarhum" class="form-control" value="{{ $pemulasaraan->nama_almarhum }}" required>
        </div>

        <div class="mb-3">
            <label for="tgl_permintaan" class="form-label">Tanggal Permintaan</label>
            <input type="date" name="tgl_permintaan" class="form-control" value="{{ $pemulasaraan->tgl_permintaan }}" required>
        </div>

        <div class="mb-3">
            <label for="tgl_pemulasaraan" class="form-label">Tanggal Pemulasaraan</label>
            <input type="date" name="tgl_pemulasaraan" class="form-control" value="{{ $pemulasaraan->tgl_pemulasaraan }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="menunggu" {{ $pemulasaraan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="berjalan" {{ $pemulasaraan->status == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                <option value="selesai" {{ $pemulasaraan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="dibatalkan" {{ $pemulasaraan->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $pemulasaraan->lokasi }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pemulasaraan->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('adminn.pemulasaraan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
