@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Anggota</h2>

    <form action="{{ route('anggota_jra.update', $anggota->id_anggota) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anggota</label>
            <input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telp</label>
            <input type="text" name="no_telp" class="form-control" value="{{ $anggota->no_telp }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control">{{ $anggota->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
            <input type="date" name="tgl_daftar" class="form-control" value="{{ $anggota->tgl_daftar }}" required>
        </div>

        <div class="mb-3">
            <label for="bln_daftar" class="form-label">Bulan Daftar</label>
            <input type="text" name="bln_daftar" class="form-control" value="{{ $anggota->bln_daftar }}" required>
        </div>

        <div class="mb-3">
            <label for="status_keaktifan" class="form-label">Status Keaktifan</label>
            <select name="status_keaktifan" class="form-select" required>
                <option value="aktif" {{ $anggota->status_keaktifan == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $anggota->status_keaktifan == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status_keanggotaan" class="form-label">Status Keanggotaan</label>
            <select name="status_keanggotaan" class="form-select" required>
                <option value="baru" {{ $anggota->status_keanggotaan == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="lama" {{ $anggota->status_keanggotaan == 'lama' ? 'selected' : '' }}>Lama</option>
                <option value="berhenti" {{ $anggota->status_keanggotaan == 'berhenti' ? 'selected' : '' }}>Berhenti</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('anggota_jra.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection