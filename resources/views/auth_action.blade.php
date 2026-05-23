@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="glass-panel text-center">
            <span class="fs-1 mb-2 d-block">🔒</span>
            <h3 class="fw-bold text-white mb-2" style="font-family: 'Orbitron', sans-serif;">VERIFIKASI AKSES</h3>
            <p class="text-secondary small mb-4">
                Untuk melakukan modifikasi jadwal tim <strong>{{ $booking->nama_tim }}</strong>, ketik ulang nomor WhatsApp yang dimasukkan saat membooking.
            </p>

            <form action="{{ route('futsal.edit', $booking->id) }}" method="GET">
                @if($actionType === 'delete')
                    <input type="hidden" name="action" value="delete">
                @endif

                <div class="mb-4 text-start">
                    <label class="form-label">NOMOR WHATSAPP VERIFIKASI</label>
                    <input type="text" name="konfirmasi_no_hp" class="form-control text-center" placeholder="0821xxxxxxxx" required autofocus autocomplete="off">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-cyber py-3">KONFIRMASI AKSI</button>
                    <a href="{{ route('futsal.jadwal') }}" class="btn btn-outline-secondary rounded-3 text-white-50 text-decoration-none py-2 btn-sm">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
