@extends('app')

@section('content')
    <div class="content-card">
        <h1>Edit Data Tas</h1>
        
        <form action="{{ route('tas.update', $tas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $tas->nama }}">
            </div>

            <div class="form-group">
                <label for="merk">Merk:</label>
                <input type="text" id="merk" name="merk" value="{{ $tas->merk }}">
            </div>

            <div class="form-group">
                <label for="kategori_tas_id">Kategori:</label>
                <select id="kategori_tas_id" name="kategori_tas_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $tas->kategori_tas_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" id="harga" name="harga" value="{{ $tas->harga }}">
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection
    <ctrl63>