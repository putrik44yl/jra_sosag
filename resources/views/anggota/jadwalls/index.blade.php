@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Daftar Jadwal</h2>
    <a href="{{ route('anggota.jadwalls.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kegiatan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwalls as $jadwall)
            <tr>
                <td>{{ $jadwall->kegiatan }}</td>
                <td>{{ $jadwall->tanggal }}</td>
                <td>{{ $jadwall->waktu }}</td>
                <td>{{ $jadwall->lokasi }}</td>
                <td>
                    <a href="{{ route('anggota.jadwalls.edit', $jadwall->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('anggota.jadwalls.destroy', $jadwall->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus jadwal ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
