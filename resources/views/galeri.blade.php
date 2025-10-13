@extends('app')

@section('content')
    <div class="content-card">
        <h1>Galeri</h1>
        <div class="gallery">
            @forelse($tass as $tas)
                @if($tas->foto)
                    <div class="card">
                        <img src="{{ asset('storage/tas_foto/' . $tas->foto) }}" alt="{{ $tas->nama }}">
                        <p>{{ $tas->nama }}</p>
                    </div>
                @endif
            @empty
                <p>Tidak ada foto tas yang tersedia.</p>
            @endforelse
        </div>
    </div>
@endsection