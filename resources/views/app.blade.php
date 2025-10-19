<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Tas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        {{-- Menu Utama --}}
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('galeri') }}">Galeri</a>
        <a href="{{ route('tambah.form') }}">Tambah Data</a>
        
        {{-- Tombol Logout --}}
        @auth
            <a href="{{ route('logout') }}" class="logout-link">Logout</a>
        @endauth
    </nav>
    
    <main class="container">
        @yield('content')
    </main>

</body>
</html>