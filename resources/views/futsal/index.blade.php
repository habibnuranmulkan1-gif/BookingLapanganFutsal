@extends('layouts.app')

@section('content')
<div class="row align-items-center min-vh-75">
    <div class="col-md-6 mb-4 mb-md-0">
        <span class="badge bg-info text-dark mb-2" style="box-shadow: 0 0 10px var(--primary-blue);">Theatre of Dreams Arena</span>
        <h1 class="display-4 fw-bold mb-3">HABIB FUTSAL</h1>
        <p class="lead text-secondary">Rasakan atmosfer lapangan kelas dunia dengan fasilitas modern berstandar tinggi.</p>

        <div class="glass-card my-4" style="border-left: 4px solid var(--primary-blue);">
            <blockquote class="blockquote mb-0">
                <p class="fs-6 italic">"Hard work will always overcome natural talent when natural talent does not work hard enough."</p>
                <footer class="blockquote-footer mt-1 text-info">Sir Alex Ferguson</footer>
            </blockquote>
        </div>

        <a href="{{ route('futsal.jadwal') }}" class="btn btn-primary btn-lg px-4 py-2 mt-2">Book Now</a>
    </div>

    <div class="col-md-6">
        <div class="hero-img-container">
            <img src="{{ asset('img1.jpg') }}" alt="Lapangan Habib Futsal" class="hero-img">
        </div>
    </div>
</div>
@endsection
