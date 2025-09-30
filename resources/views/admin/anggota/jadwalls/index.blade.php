@extends('layouts.anggota')

@section('content')
<div class="container">
    <h2>Daftar Jadwal</h2>
    <a href="{{ route('anggota.jadwalls.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwalls as $jadwall)
                <tr>
                    <td>{{ $jadwall->id }}</td>
                    <td>{{ $jadwall->tanggal }}</td>
                    <td>{{ $jadwall->hari }}</td>
                    <td>{{ $jadwall->keterangan }}</td>
                    <td>
                        <a href="{{ route('anggota.jadwalls.edit', $jadwall->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('anggota.jadwalls.destroy', $jadwall->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Belum ada jadwal.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
