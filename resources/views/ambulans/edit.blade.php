@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Data Ambulans</h2>

    <form action="{{ route('ambulans.update', $ambulans->id_ambulans) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_anggota" class="form-label">Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-control" required>
                @foreach($anggota as $a)
                    <option value="{{ $a->id_anggota }}" {{ $a->id_anggota == $ambulans->id_anggota ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Sopir</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $ambulans->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="plat" class="form-label">Plat</label>
            <input type="text" name="plat" id="plat" class="form-control" value="{{ $ambulans->plat }}" required>
        </div>

        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            <input type="text" name="tujuan" id="tujuan" class="form-control" value="{{ $ambulans->tujuan }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="tersedia" {{ $ambulans->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="dipakai" {{ $ambulans->status == 'dipakai' ? 'selected' : '' }}>Dipakai</option>
                <option value="rusak" {{ $ambulans->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('ambulans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
