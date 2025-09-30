@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Pengguna Sarana</h2>

    <form action="{{ route('admin.pengguna_sarana.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_anggota" class="form-label">Nama Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id_anggota }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_sarana" class="form-label">Nama Sarana</label>
            <select name="id_sarana" id="id_sarana" class="form-control" required>
                <option value="">-- Pilih Sarana --</option>
                @foreach($sarana as $s)
                    <option value="{{ $s->id_sarana }}">{{ $s->nama_sarana }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_pakai" class="form-label">Tanggal Pakai</label>
            <input type="date" name="tanggal_pakai" id="tanggal_pakai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.pengguna_sarana.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
