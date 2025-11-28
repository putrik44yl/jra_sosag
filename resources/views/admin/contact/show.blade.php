@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Detail Pesan</h3>

    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <h5>{{ $contact->subject ?: 'Tanpa subjek' }}</h5>
            <p><strong>Nama:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Waktu:</strong> {{ $contact->created_at->format('d M Y H:i') }}</p>
            <hr>
            <p>{{ $contact->message }}</p>
        </div>
    </div>
</div>
@endsection