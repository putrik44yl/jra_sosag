@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Pesan Contact</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($contacts->isEmpty())
        <p>Belum ada pesan.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Dikirim</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $c)
            <tr @if(!$c->is_read) class="table-warning" @endif>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->subject }}</td>
                <td>{{ $c->created_at->format('d M Y H:i') }}</td>
                <td>
                    <a href="{{ route('admin.contact.show', $c->id) }}" class="btn btn-sm btn-primary">Lihat</a>

                    <form action="{{ route('admin.contact.destroy', $c->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus pesan?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
