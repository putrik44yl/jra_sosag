@extends('layouts.admin')

@section('content')
<div class="container-xxl">

    <h4 class="mb-4">Hasil Pencarian: <strong>{{ $q }}</strong></h4>

    {{-- PEMULASARAAN --}}
    <h5 class="mt-4">Pemulasaraan</h5>
    @if($pemulasaraan->count())
        <ul class="list-group mb-4">
            @foreach($pemulasaraan as $p)
                <li class="list-group-item d-flex justify-content-between">
                    <span>
                        {{ $p->nama_almarhum }} — 
                        <strong>{{ ucfirst($p->status) }}</strong>
                    </span>

                    <a href="{{ route('admin.pemulasaraan.show', $p->id_pemulasaraan) }}"
                       class="btn btn-sm btn-primary">
                        Detail
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Tidak ada hasil.</p>
    @endif


    {{-- ANGGOTA --}}
    <h5 class="mt-4">Anggota JRA</h5>
    @if($anggota->count())
        <ul class="list-group mb-4">
            @foreach($anggota as $a)
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $a->nama }} — {{ $a->alamat }}</span>

                    <a href="{{ route('admin.anggota.show', $a->id_anggota) }}"
                       class="btn btn-sm btn-primary">
                        Detail
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Tidak ada hasil.</p>
    @endif


    {{-- AMBULANS --}}
    <h5 class="mt-4">Ambulans</h5>
    @if($ambulans->count())
        <ul class="list-group mb-4">
            @foreach($ambulans as $x)
                <li class="list-group-item d-flex justify-content-between">
                    <span>
                        {{ $x->nama }} — {{ $x->plat }}  
                        ({{ ucfirst($x->status) }})
                    </span>

                    <a href="{{ route('admin.ambulans.show', $x->id_ambulans) }}"
                       class="btn btn-sm btn-primary">
                        Detail
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Tidak ada hasil.</p>
    @endif



    {{-- PEMAKAMAN --}}
    <h5 class="mt-4">Pemakaman</h5>
    @if($pemakaman->count())
        <ul class="list-group mb-4">
            @foreach($pemakaman as $pm)
                <li class="list-group-item d-flex justify-content-between">
                    <span>
                        {{ $pm->nama_almarhum }} — Blok {{ $pm->blok }}
                    </span>

                    <a href="{{ route('admin.pemakaman.show', $pm->id) }}"
                       class="btn btn-sm btn-primary">
                        Detail
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Tidak ada hasil.</p>
    @endif

</div>
@endsection
