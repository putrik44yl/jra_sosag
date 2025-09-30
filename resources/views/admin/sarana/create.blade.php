@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Sarana Baru</h2>

    <form action="{{ route('admin.sarana.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_sarana" class="form-label">Nama Sarana</label>
            <input type="text" name="nama_sarana" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="0" value="0" required>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select name="kondisi" class="form-select" required>
                <option value="baik">Baik</option>
                <option value="rusak ringan">Rusak Ringan</option>
                <option value="rusak berat">Rusak Berat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.sarana.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
