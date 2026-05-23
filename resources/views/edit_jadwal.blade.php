@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="col-md-6">
        <div class="glass-panel">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-warning text-dark mb-2 fw-bold px-3 py-1" style="font-family: 'Orbitron', sans-serif;">MODE EDIT</span>
                    <h3 class="fw-bold text-white mb-0" style="font-family: 'Orbitron', sans-serif;">PERBARUI JADWAL</h3>
                </div>

                <form action="{{ route('futsal.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan jadwal bermain tim ini?')">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="konfirmasi_no_hp" value="{{ $booking->no_hp }}">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-sm btn-outline-danger px-3">HAPUS BOOKING</button>
                        <a href="{{ route('futsal.jadwal') }}" class="btn btn-sm btn-outline-secondary text-white-50 text-decoration-none px-3 d-flex align-items-center">Kembali</a>
                    </div>
                </form>
            </div>

            <form action="{{ route('futsal.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">NAMA TIM</label>
                    <input type="text" name="nama_tim" class="form-control" value="{{ $booking->nama_tim }}" required autocomplete="off">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label">JAM MULAI</label>
                        <input type="time" name="jam_mulai" class="form-control" value="{{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }}" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">JAM SELESAI</label>
                        <input type="time" name="jam_selesai" class="form-control" value="{{ \Carbon\Carbon::parse($booking->jam_selesai)->format('H:i') }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">NOMOR WHATSAPP (KONFIRMASI)</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $booking->no_hp }}" required>
                </div>

                <button type="submit" class="btn btn-cyber w-100 py-3">SIMPAN PERUBAHAN JADWAL</button>
            </form>
        </div>
    </div>
</div>
@endsection 
