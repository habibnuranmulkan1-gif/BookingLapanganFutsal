<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FutsalController extends Controller
{
    // Halaman Home
    public function index() {
        return view('futsal.index');
    }

    // Halaman Jadwal (Menampilkan Kalender & List Booking)
    public function jadwal() {
        $bookings = Booking::all();
        return view('futsal.jadwal', compact('bookings'));
    }

    // Proses Simpan Booking
    public function store(Request $request) {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'no_hp' => 'required|string',
        ]);

        $booking = Booking::create($request->all());

        // Redirect ke halaman tiket/countdown bawa data ID terbaru
        return redirect()->route('futsal.tiket', $booking->id);
    }

    // Halaman Tiket / Countdown Pesanan
    public function tiket($id) {
        $booking = Booking::findOrFail($id);

        // Menggabungkan tanggal dan jam untuk target countdown
        $targetTarget = Carbon::parse($booking->tanggal . ' ' . $booking->jam_mulai)->format('Y-m-d H:i:s');

        return view('futsal.tiket', compact('booking', 'targetTarget'));
    }

    // Halaman Contact
    public function contact() {
        return view('futsal.contact');
    }
}
