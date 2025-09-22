@extends('layouts.dashboard_anggota')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y text-center">
    <h3>Profil Saya</h3>
    <img src="{{ $user->foto ? asset('storage/'.$user->foto) : asset('admin/assets/img/avatars/8.png') }}" 
         class="rounded-circle mb-3" width="120" height="120">

    <p><strong>Nama:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <a href="{{ route('profil.edit') }}" class="btn btn-primary">Edit Profil</a>
</div>
@endsection
