<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habib Futsal Arena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('futsal.index') }}">HABIB<span>FUTSAL</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ Route::is('futsal.index') ? 'active' : '' }}" href="{{ route('futsal.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('futsal.jadwal') ? 'active' : '' }}" href="{{ route('futsal.jadwal') }}">Jadwal Booking</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('futsal.contact') ? 'active' : '' }}" href="{{ route('futsal.contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 130px; margin-bottom: 60px;">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
