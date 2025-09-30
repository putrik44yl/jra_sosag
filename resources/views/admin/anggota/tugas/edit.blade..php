@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Tugas</h2>

    <form action="{{ route('anggota.tugas.update', $tugas->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama Tugas --}}
        <div class="mb-3">
            <label for="nama_tugas" class="form-label">Nama Tugas</label>
            <input type="text" name="nama_tugas" id="nama_tugas" 
                   class="form-control @error('nama_tugas') is-invalid @enderror" 
                   value="{{ old('nama_tugas', $tugas->nama_tugas) }}" required>
            @error('nama_tugas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" 
                      class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Bulan --}}
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" name="bulan" id="bulan" 
                   class="form-control @error('bulan') is-invalid @enderror" 
                   value="{{ old('bulan', $tugas->bulan) }}" required>
            @error('bulan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                <option value="belum" {{ old('status', $tugas->status) == 'belum' ? 'selected' : '' }}>Belum</option>
                <option value="selesai" {{ old('status', $tugas->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('anggota.tugas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
