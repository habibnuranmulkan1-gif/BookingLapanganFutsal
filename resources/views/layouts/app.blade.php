<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habib Futsal - Cyber Arena</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('futsal.index') }}">
                HABIB <span>FUTSAL</span>
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('futsal.index') }}" class="nav-link {{ Route::is('futsal.index') ? 'active' : '' }}">BERANDA</a>
                <a href="{{ route('futsal.jadwal') }}" class="nav-link {{ Route::is('futsal.jadwal') ? 'active' : '' }}">JADWAL & BOOKING</a>
                <a href="{{ route('futsal.contact') }}" class="nav-link {{ Route::is('futsal.contact') ? 'active' : '' }}">KONTAK</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
