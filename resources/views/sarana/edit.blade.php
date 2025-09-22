@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Sarana</h2>

    <form action="{{ route('sarana.update', $sarana->id_sarana) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_sarana" class="form-label">Nama Sarana</label>
            <input type="text" name="nama_sarana" class="form-control" value="{{ $sarana->nama_sarana }}" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="0" value="{{ $sarana->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select name="kondisi" class="form-select" required>
                <option value="baik" {{ $sarana->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="rusak ringan" {{ $sarana->kondisi == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="rusak berat" {{ $sarana->kondisi == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $sarana->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sarana.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
