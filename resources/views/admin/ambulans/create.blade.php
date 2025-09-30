@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Data Ambulans</h2>

    <form action="{{ route('admin.ambulans.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="id_anggota" class="form-label">Pilih Anggota</label>
        <select name="id_anggota" class="form-control" required>
            <option value="">-- Pilih Anggota --</option>
            @foreach($anggota as $a)
                <option value="{{ $a->id_anggota }}">{{ $a->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Ambulans</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="plat" class="form-label">Plat Nomor</label>
        <input type="text" name="plat" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="tujuan" class="form-label">Tujuan</label>
        <input type="text" name="tujuan" class="form-control">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control" required>
            <option value="tersedia">Tersedia</option>
            <option value="dipakai">Dipakai</option>
            <option value="rusak">Rusak</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.anggota_jra.index') }}" class="btn btn-secondary">Batal</a>
</form>

</div>
@endsection
