@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3 text-dark fw-bold" role="alert" style="background: var(--primary-blue); border: none; box-shadow: 0 0 15px var(--primary-blue);">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4 rounded-3 text-white fw-bold" role="alert" style="background: var(--mu-red-accent); border: none; box-shadow: 0 0 15px var(--mu-red-accent);">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4 align-items-stretch">
        <div class="col-lg-6 d-flex flex-column">
            <div class="glass-panel d-flex flex-column justify-content-between h-100">
                <div>
                    <h3 class="fw-bold mb-1 text-white" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">RESERVASI</h3>
                    <p class="text-muted small mb-4">Pilih tanggal dari kalender geser di bawah ini</p>

                    <div class="calendar-slider mb-4" id="customCalendar"></div>

                    <form action="{{ route('futsal.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="tanggal" id="selected_date" required>

                        <div class="mb-3">
                            <label class="form-label">NAMA TIM</label>
                            <input type="text" name="nama_tim" class="form-control" placeholder="Masukkan nama tim..." required autocomplete="off">
                        </div>

                        <div class="row g-3">
                            <div class="col-6 mb-3">
                                <label class="form-label">JAM MULAI</label>
                                <input type="time" name="jam_mulai" class="form-control" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">JAM SELESAI</label>
                                <input type="time" name="jam_selesai" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">NOMOR WHATSAPP</label>
                            <input type="tel" name="no_hp" class="form-control" placeholder="Contoh: 0821xxxxxxxx" required>
                            <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">*Gunakan nomor ini sebagai sandi kunci jika ingin mengedit/membatalkan jadwal.</small>
                        </div>

                        <button type="submit" class="btn btn-cyber w-100 py-3">BOOKING SEKARANG</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-flex flex-column">
            <div class="glass-panel d-flex flex-column h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-1 text-white" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">LIVE STATUS</h3>
                        <p class="text-muted small mb-0">Daftar tim yang sudah memesan waktu tanding</p>
                    </div>
                    <span class="badge bg-success text-dark px-3 py-2 fw-bold" style="box-shadow: 0 0 15px rgba(25, 135, 84, 0.4); font-family: 'Orbitron', sans-serif;">ARENA OPEN</span>
                </div>

                <div class="table-responsive flex-grow-1">
                    <table class="table table-dark table-hover align-middle mb-0" style="background: transparent;">
                        <thead>
                            <tr style="border-bottom: 2px solid var(--primary-blue);">
                                <th class="pb-3 text-info small" style="font-family: 'Orbitron', sans-serif; font-size: 0.75rem;">NAMA TIM</th>
                                <th class="pb-3 text-info small" style="font-family: 'Orbitron', sans-serif; font-size: 0.75rem;">TANGGAL</th>
                                <th class="pb-3 text-info small" style="font-family: 'Orbitron', sans-serif; font-size: 0.75rem;">JAM MAIN</th>
                                <th class="pb-3 text-info small text-end" style="font-family: 'Orbitron', sans-serif; font-size: 0.75rem;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $b)
                                <tr style="border-bottom: 1px solid rgba(255, 255, 255, 0.05);">
                                    <td class="py-3 text-white">
                                        <div class="fw-bold">{{ $b->nama_tim }}</div>

                                        @if($b->user)
                                            <span class="badge bg-primary d-inline-block mt-1" style="font-size: 0.65rem; padding: 3px 8px; border-radius: 4px; box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);">
                                                🛡️ Member: {{ $b->user->name }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary d-inline-block mt-1" style="font-size: 0.65rem; padding: 3px 8px; border-radius: 4px; opacity: 0.7;">
                                                👤 Guest Pendaftar
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3 text-secondary">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3 text-info fw-bold">
                                        {{ \Carbon\Carbon::parse($b->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($b->jam_selesai)->format('H:i') }} WIB
                                    </td>
                                    <td class="py-3 text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('futsal.edit', $b->id) }}" class="btn btn-sm btn-outline-warning fw-bold px-3" style="font-size: 0.7rem;">EDIT</a>
                                            <a href="{{ route('futsal.edit', $b->id) }}?action=delete" class="btn btn-sm btn-outline-danger fw-bold px-3" style="font-size: 0.7rem;">CANCEL</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-5 small">Belum ada jadwal tanding dalam waktu dekat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const calendarContainer = document.getElementById('customCalendar');
    const hiddenInput = document.getElementById('selected_date');
    const daysName = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
    const monthsName = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    for (let i = 0; i < 14; i++) {
        let d = new Date();
        d.setDate(d.getDate() + i);

        let dayName = daysName[d.getDay()];
        let dateNum = d.getDate();
        let monthName = monthsName[d.getMonth()];

        let yyyy = d.getFullYear();
        let mm = String(d.getMonth() + 1).padStart(2, '0');
        let dd = String(dateNum).padStart(2, '0');
        let fullDateString = `${yyyy}-${mm}-${dd}`;

        let card = document.createElement('div');
        card.className = `calendar-day-card ${i === 0 ? 'active' : ''}`;
        if(i === 0) hiddenInput.value = fullDateString;

        card.innerHTML = `
            <div class="small text-muted fw-bold">${dayName}</div>
            <div class="fs-3 fw-bold my-1 text-white">${dateNum}</div>
            <div class="small text-info fw-bold" style="font-size: 0.75rem;">${monthName}</div>
        `;

        card.addEventListener('click', function() {
            document.querySelectorAll('.calendar-day-card').forEach(c => c.classList.remove('active'));
            card.classList.add('active');
            hiddenInput.value = fullDateString;
        });

        calendarContainer.appendChild(card);
    }
</script>
@endsection
