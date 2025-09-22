@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Pengguna Sarana</h2>

    <form action="{{ route('pengguna_sarana.update', $pengguna->id_pengguna) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_anggota" class="form-label">Nama Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id_anggota }}" {{ $pengguna->id_anggota == $a->id_anggota ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_sarana" class="form-label">Nama Sarana</label>
            <select name="id_sarana" id="id_sarana" class="form-control" required>
                <option value="">-- Pilih Sarana --</option>
                @foreach($sarana as $s)
                    <option value="{{ $s->id_sarana }}" {{ $pengguna->id_sarana == $s->id_sarana ? 'selected' : '' }}>
                        {{ $s->nama_sarana }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_pakai" class="form-label">Tanggal Pakai</label>
            <input type="date" name="tanggal_pakai" id="tanggal_pakai" class="form-control" 
                   value="{{ $pengguna->tanggal_pakai }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ $pengguna->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pengguna_sarana.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
