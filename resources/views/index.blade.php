@extends('layouts.app')

@section('content')
<div class="row align-items-center justify-content-center pt-4" style="min-height: 70vh;">

    <div class="col-md-6 mb-4 mb-md-0">
        <div class="glass-panel">
            <span class="badge bg-info text-dark mb-3 fw-bold px-3 py-2" style="box-shadow: 0 0 15px var(--primary-blue); font-family: 'Orbitron', sans-serif;">
                THEATRE OF DREAMS ARENA
            </span>
            <h1 class="display-4 fw-black text-white mb-3" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">
                HABIB <span style="color: var(--primary-blue); text-shadow: 0 0 15px var(--neon-glow);">FUTSAL</span>
            </h1>
            <p class="lead text-secondary mb-4" style="font-weight: 500; line-height: 1.7;">
                Rasakan atmosfer lapangan kelas dunia dengan fasilitas modern, pencahayaan sinematik, dan kualitas rumput berstandar tinggi.
            </p>

            <div class="p-3 mb-4" style="border-left: 4px solid var(--primary-blue); background: rgba(0, 240, 255, 0.03); border-radius: 0 12px 12px 0;">
                <blockquote class="blockquote mb-0">
                    <p class="fs-6 text-white-50" style="font-style: italic;">"Hard work will always overcome natural talent when natural talent does not work hard enough."</p>
                    <footer class="blockquote-footer mt-2 text-info" style="font-family: 'Orbitron', sans-serif; font-size: 0.8rem;">Sir Alex Ferguson</footer>
                </blockquote>
            </div>

            <a href="{{ route('futsal.jadwal') }}" class="btn btn-cyber py-3 px-4 w-100 text-center text-decoration-none">
                Book Field Now
            </a>
        </div>
    </div>

    <div class="col-md-6 text-center">
        <div class="hero-img-container">
            <img src="{{ asset('img1.jpg') }}" alt="Lapangan Habib Futsal" class="hero-img">
        </div>
    </div>

</div>
@endsection
