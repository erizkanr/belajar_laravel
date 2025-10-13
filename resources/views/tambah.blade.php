@extends('app')

@section('content')
    <div class="content-card">
        <h1>Tambah Data Tas</h1>
        <form action="{{ route('tambah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="merk">Merk:</label>
                <input type="text" id="merk" name="merk">
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" id="harga" name="harga">
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto">
            </div>
            <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>
@endsection