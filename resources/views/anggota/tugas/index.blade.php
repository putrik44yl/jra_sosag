@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Daftar Tugas</h2>
    <a href="{{ route('anggota.tugas.create') }}" class="btn btn-primary mb-3">Tambah Tugas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tugas as $tuga)
            <tr>
                <td>{{ $tuga->judul }}</td>
                <td>{{ $tuga->deskripsi }}</td>
                <td>{{ $tuga->deadline }}</td>
                <td>{{ ucfirst($tuga->status) }}</td>
                <td>
                    <a href="{{ route('anggota.tugas.edit', $tuga->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('anggota.tugas.destroy', $tuga->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin mau hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
