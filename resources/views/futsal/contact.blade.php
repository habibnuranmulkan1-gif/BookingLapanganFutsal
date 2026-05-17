@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="col-md-6">
        <div class="glass-panel text-center position-relative overflow-hidden" style="border: 1px solid rgba(0, 240, 255, 0.25);">

            <div class="position-absolute top-0 start-50 translate-middle-x" style="width: 150px; height: 4px; background: linear-gradient(90deg, transparent, #00f0ff, transparent); box-shadow: 0 0 20px #0055ff;"></div>

            <div class="my-4">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px; background: rgba(0, 240, 255, 0.1); border: 1px solid var(--primary-blue); box-shadow: 0 0 20px rgba(0, 240, 255, 0.2);">
                    <span style="font-size: 2rem;">⚽</span>
                </div>
            </div>

            <h3 class="fw-bold mb-1 text-white" style="font-family: 'Orbitron', sans-serif;">Habib Nuran Mulkan</h3>
            <p class="text-info tracking-wide text-uppercase small mb-4" style="font-weight: 800; letter-spacing: 2px;">Owner & Arena Manager</p>

            <p class="text-secondary px-3 mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                Punya pertanyaan seputar reservasi lapangan, kolaborasi turnamen, atau kendala sistem booking? Silakan hubungi kami langsung di bawah ini.
            </p>

            <hr class="my-4" style="border-color: rgba(0, 240, 255, 0.15);">

            <div class="text-start px-3 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="me-3 fs-4 text-info">📞</span>
                    <div>
                        <div class="form-label m-0 p-0">WhatsApp Official (dummy yaa)</div>
                        <div class="fw-bold text-white" style="font-size: 1.05rem;">+62 821-0000-7890</div>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <span class="me-3 fs-4 text-info">📍</span>
                    <div>
                        <div class="form-label m-0 p-0">Lokasi Lapangan</div>
                        <div class="fw-bold text-white" style="font-size: 1.05rem;">Habib Futsal Arena, Jl. Stadion Utama No. 7, Aceh</div>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <span class="me-3 fs-4 text-info">✉️</span>
                    <div>
                        <div class="form-label m-0 p-0">Email Bisnis</div>
                        <div class="fw-bold text-white" style="font-size: 1.05rem;">habibfutsal.official@gmail.com</div>
                    </div>
                </div>
            </div>

            <a href="https://wa.me/6282100007890?text=Halo%20Bang%20Habib"
               target="_blank"
               class="btn btn-cyber w-100 py-3 mt-2">
                Hubungi via WhatsApp
            </a>

        </div>
    </div>
</div>
@endsection
