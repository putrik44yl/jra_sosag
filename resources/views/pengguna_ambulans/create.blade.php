@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Pengguna Ambulans</h2>

    <form action="{{ route('pengguna_ambulans.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Ambulans</label>
            <select name="id_ambulans" class="form-control" required>
                <option value="">-- Pilih Ambulans --</option>
                @foreach($ambulans as $a)
                    <option value="{{ $a->id_ambulans }}">{{ $a->nama }} ({{ $a->plat }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="id_user" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Anggota</label>
            <select name="id_anggota" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $ag)
                    <option value="{{ $ag->id_anggota }}">{{ $ag->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Penggunaan</label>
            <input type="date" name="tgl_penggunaan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tujuan</label>
            <input type="text" name="tujuan" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="menunggu">Menunggu</option>
                <option value="berjalan">Berjalan</option>
                <option value="selesai">Selesai</option>
                <option value="dibatalkan">Dibatalkan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pengguna_ambulans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
