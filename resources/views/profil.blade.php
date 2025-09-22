@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Profil Saya</h2>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
        </div>
    </div>
</div>
@endsection
