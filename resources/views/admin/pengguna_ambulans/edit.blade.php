@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Pengguna Ambulans</h2>

    <form action="{{ route('admin.pengguna_ambulans.update', $pengguna->id_pengguna_ambulans) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Ambulans</label>
            <select name="id_ambulans" class="form-control" required>
                @foreach($ambulans as $a)
                    <option value="{{ $a->id_ambulans }}" {{ $pengguna->id_ambulans == $a->id_ambulans ? 'selected' : '' }}>
                        {{ $a->nama }} ({{ $a->plat }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="id_user" class="form-control" required>
                @foreach($users as $u)
                    <option value="{{ $u->id }}" {{ $pengguna->id_user == $u->id ? 'selected' : '' }}>
                        {{ $u->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Anggota</label>
            <select name="id_anggota" class="form-control" required>
                @foreach($anggota as $ag)
                    <option value="{{ $ag->id_anggota }}" {{ $pengguna->id_anggota == $ag->id_anggota ? 'selected' : '' }}>
                        {{ $ag->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Penggunaan</label>
            <input type="date" name="tgl_penggunaan" class="form-control" value="{{ $pengguna->tgl_penggunaan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tujuan</label>
            <input type="text" name="tujuan" class="form-control" value="{{ $pengguna->tujuan }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="menunggu" {{ $pengguna->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="berjalan" {{ $pengguna->status == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                <option value="selesai" {{ $pengguna->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="dibatalkan" {{ $pengguna->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.pengguna_ambulans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
