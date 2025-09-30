@extends('layouts.anggota')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="text-center mb-4">
        <img src="{{ Auth::user()->profil && Auth::user()->profil->foto ? asset('storage/'.Auth::user()->profil->foto) : asset('admin/assets/img/avatars/8.png') }}"
             class="rounded-circle" width="120" height="120" alt="Foto Profil">
        <h3 class="mt-3">{{ Auth::user()->name }}</h3>
        <p class="text-muted">{{ Auth::user()->email }}</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Profil Saya</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ Auth::user()->profil->nama_lengkap ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ Auth::user()->profil->alamat ?? '-' }}</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>{{ Auth::user()->profil->no_telepon ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ Auth::user()->profil->tanggal_lahir ?? '-' }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-end">
            @if(Auth::user()->profil)
                <a href="{{ route('anggota.profil.edit', Auth::user()->profil->id) }}" class="btn btn-primary">Edit Profil</a>
            @else
                <a href="{{ route('anggota.profil.create') }}" class="btn btn-success">Buat Profil</a>
            @endif
        </div>
    </div>

</div>
@endsection
