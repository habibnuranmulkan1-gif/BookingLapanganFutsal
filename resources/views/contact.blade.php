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
            <p class="text-info tracking-wide text-uppercase small mb-4" style="font-weight: 800; font-family: 'Orbitron', sans-serif;">Developer & Owner</p>

            <div class="text-start mx-auto p-4 mb-4" style="background: rgba(255,255,255,0.02); border-radius: 12px; max-width: 450px; border: 1px solid rgba(255,255,255,0.05);">
                <div class="d-flex align-items-center mb-3">
                    <span class="me-3 fs-4 text-info">📞</span>
                    <div>
                        <div class="form-label m-0 p-0" style="font-size: 0.75rem; color: var(--primary-blue);">WhatsApp Official</div>
                        <div class="fw-bold text-white" style="font-size: 1.05rem;">+62 821-0000-7890</div>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <span class="me-3 fs-4 text-info">📍</span>
                    <div>
                        <div class="form-label m-0 p-0" style="font-size: 0.75rem; color: var(--primary-blue);">Lokasi Lapangan</div>
                        <div class="fw-bold text-white" style="font-size: 1.05rem;">Habib Futsal Arena, Jl. Stadion Utama No. 7, Aceh</div>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <span class="me-3 fs-4 text-info">✉️</span>
                    <div>
                        <div class="form-label m-0 p-0" style="font-size: 0.75rem; color: var(--primary-blue);">Email Bisnis</div>
                        <div class="fw-bold text-white" style="font-size: 1.05rem;">habibfutsal.official@gmail.com</div>
                    </div>
                </div>
            </div>

            <a href="https://wa.me/6282100007890?text=Halo%20Bang%20Habib"
               target="_blank"
               class="btn btn-cyber px-5 py-3 text-uppercase fw-bold" style="font-family: 'Orbitron', sans-serif; font-size: 0.85rem; text-decoration: none; display: inline-block;">
               Hubungi Admin Toko
            </a>
        </div>
    </div>
</div>
@endsection
