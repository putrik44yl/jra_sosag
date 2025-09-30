@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Edit Tugas</h2>
    <form action="{{ route('anggota.tugas.update', $tuga->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $tuga->judul }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $tuga->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Deadline</label>
            <input type="date" name="deadline" value="{{ $tuga->deadline }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $tuga->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="selesai" {{ $tuga->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
