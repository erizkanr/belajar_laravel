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
                <label for="harga">Harga:</label>
                <input type="text" id="harga" name="harga" value="{{ $tas->harga }}">
            </div>

            <button type="submit" class="btn-primary">Perbarui</button>
        </form>
    </div>
@endsection