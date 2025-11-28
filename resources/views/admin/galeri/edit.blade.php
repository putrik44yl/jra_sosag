@extends('layouts.admin')

@section('content')

<div class="container-xxl p-4">
    <h3>Edit Galeri</h3>

    <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Judul</label>
        <input type="text" name="judul" value="{{ $galeri->judul }}" class="form-control mb-2">

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-2">{{ $galeri->deskripsi }}</textarea>

        <label>Tipe</label>
        <select name="tipe" class="form-control mb-2">
            <option value="foto" @if($galeri->tipe=='foto') selected @endif>Foto</option>
            <option value="video" @if($galeri->tipe=='video') selected @endif>Video</option>
        </select>

        <label>Ganti File (Opsional)</label>
        <input type="file" name="file" class="form-control mb-3">

        <button class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
