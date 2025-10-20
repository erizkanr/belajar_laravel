@extends('app')

@section('content')
    <div class="content-card">
        <h1>Daftar Tas</h1>
        <a href="{{ route('tambah.form') }}" class="btn btn-primary">Tambah Tas</a>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tass as $tas)
                <tr>
                    <td>{{ $tas->nama }}</td>
                    <td>{{ $tas->merk }}</td>
                    <td>Rp {{ number_format($tas->harga, 0, ',', '.') }}</td>
                    <td>{{ $tas->kategori ? $tas->kategori->nama : "Kategori null"}}</td>
                    <td>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('tas.edit', $tas->id) }}" class="btn-opsi btn-edit">edit</a>
                        
                        {{-- Tombol Hapus (dalam form untuk keamanan) --}}
                        <form action="{{ route('tas.destroy', $tas->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-opsi btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Tidak ada data tas yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection