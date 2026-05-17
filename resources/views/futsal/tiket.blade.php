@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 text-center">
        <div class="glass-panel" style="border: 2px solid rgba(0, 240, 255, 0.3); background: rgba(6, 10, 19, 0.8);">

            <div class="badge bg-danger px-3 py-2 mb-3 text-uppercase tracking-widest" style="font-family: 'Orbitron', sans-serif;">Matchday Notice</div>
            <h1 class="display-5 fw-black text-white" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">DATANG TEPAT WAKTU!</h1>
            <p class="text-secondary">Tiket booking terverifikasi. Siapkan fisik timmu untuk bertanding.</p>

            <div class="giant-countdown">
                <div class="cd-segment">
                    <div class="cd-number" id="days">00</div>
                    <div class="cd-label">Hari</div>
                </div>
                <div class="cd-segment">
                    <div class="cd-number" id="hours">00</div>
                    <div class="cd-label">Jam</div>
                </div>
                <div class="cd-segment">
                    <div class="cd-number" id="minutes">00</div>
                    <div class="cd-label">Menit</div>
                </div>
                <div class="cd-segment">
                    <div class="cd-number" id="seconds">00</div>
                    <div class="cd-label">Detik</div>
                </div>
            </div>

            <div class="mx-auto my-4 p-4 rounded-4" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); max-width: 500px;">
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted fw-bold">NAMA SQUAD:</span>
                    <span class="text-info fw-black" style="font-family: 'Orbitron', sans-serif;">{{ strtoupper($booking->nama_tim) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted fw-bold">HARI & TANGGAL:</span>
                    <span class="text-white fw-bold">{{ \Carbon\Carbon::parse($booking->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted fw-bold">KICK OFF TIME:</span>
                    <span class="text-warning fw-bold" style="font-size: 1.1rem;">{{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }} WIB</span>
                </div>
            </div>

            <a href="{{ route('futsal.index') }}" class="btn btn-outline-secondary px-4 mt-3 rounded-pill btn-sm"> kembali ke beranda</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const targetDate = new Date("{{ $targetTarget }}").getTime();

    const countdownFunction = setInterval(function() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance < 0) {
            clearInterval(countdownFunction);
            document.querySelector(".giant-countdown").innerHTML = "<div class='w-100 py-4 text-center fs-3 fw-bold text-success' style='grid-column: span 4;'>WAKTU MAIN TELAH TIBA! ⚽ WELCOME TO THE THEATRE OF DREAMS</div>";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("days").innerText = String(days).padStart(2, '0');
        document.getElementById("hours").innerText = String(hours).padStart(2, '0');
        document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
        document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');
    }, 1000);
</script>
@endsection
