@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="row g-4 align-items-stretch">

        <div class="col-lg-6 d-flex flex-column">
            <div class="glass-panel d-flex flex-column justify-content-between h-100">
                <div>
                    <h3 class="fw-bold mb-1" style="font-family: 'Orbitron', sans-serif;">RESERVASI</h3>
                    <p class="text-muted small mb-4">Pilih tanggal dari kalender geser di bawah</p>

                    <div class="calendar-slider mb-4" id="customCalendar"></div>

                    <form action="{{ route('futsal.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="tanggal" id="selected_date" required>

                        <div class="mb-3">
                            <label class="form-label">NAMA TIM</label>
                            <input type="text" name="nama_tim" class="form-control" placeholder="Masukkan nama tim kamu..." required>
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
                            <input type="tel" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                        </div>

                        <button type="submit" class="btn btn-cyber w-100 py-3">PROSES BOOKING NOW</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-flex flex-column">
            <div class="glass-panel h-100 d-flex flex-column">
                <h3 class="fw-bold mb-4" style="font-family: 'Orbitron', sans-serif;">LIVE STATUS JADWAL</h3>

                <div class="table-responsive flex-grow-1" style="max-height: 480px; overflow-y: auto;">
                    <table class="table table-dark table-borderless align-middle m-0">
                        <thead style="position: sticky; top: 0; background: var(--dark-bg); z-index: 2;">
                            <tr style="border-bottom: 1px solid var(--border-glass);">
                                <th class="py-3 text-secondary small">TIM</th>
                                <th class="py-3 text-secondary small">TANGGAL</th>
                                <th class="py-3 text-secondary small">WAKTU</th>
                                <th class="py-3 text-secondary small text-end">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $b)
                                <tr style="border-bottom: 1px solid rgba(255,255,255,0.03);">
                                    <td class="py-3 fw-bold text-white">{{ $b->nama_tim }}</td>
                                    <td class="py-3 text-secondary">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3 text-info fw-bold">{{ \Carbon\Carbon::parse($b->jam_mulai)->format('H:i') }} WIB</td>
                                    <td class="py-3 text-end">
                                        <span class="badge px-3 py-2" style="background: rgba(0, 240, 255, 0.1); color: var(--primary-blue); border: 1px solid var(--primary-blue);">CONFIRMED</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-5">Belum ada aktivitas booking lapangan hari ini.</td>
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
            <div class="small text-info fw-bold">${monthName}</div>
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
