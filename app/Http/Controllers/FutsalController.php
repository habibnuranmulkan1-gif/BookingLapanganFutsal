<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class FutsalController extends Controller
{
    // Tampilkan Halaman Beranda (Landing Page)
    public function index()
    {
        return view('index');
    }

    // Tampilkan Halaman Kontak Informasi
    public function contact()
    {
        return view('contact');
    }

  // Tampilkan Halaman Form Reservasi & Tabel Live Status
    public function jadwalIndex()
    {
        $bookings = Booking::with('user')
                            ->where('tanggal', '>=', now()->toDateString())
                            ->orderBy('tanggal', 'asc')
                            ->orderBy('jam_mulai', 'asc')
                            ->get();

        return view('jadwal', compact('bookings'));
    }
    // Aksi Menyimpan Data Booking Baru (Guest Allowed)
    public function store(Request $request)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'no_hp' => 'required|string',
        ]);

        $booking = Booking::create([
            'user_id' => null, // Dibuat NULL agar siapa saja bisa booking tanpa login
            'nama_tim' => $request->nama_tim,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'no_hp' => $request->no_hp,
        ]);

        $targetTarget = $booking->tanggal . ' ' . $booking->jam_mulai;
        return view('tiket', compact('booking', 'targetTarget'));
    }

    // Membuka Gerbang Verifikasi Nomor HP Sebelum Edit / Delete
    public function edit(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Cek apakah user ingin melakukan hapus atau edit
        $actionType = $request->query('action') === 'delete' ? 'delete' : 'edit';

        // Jika form verifikasi nomor HP belum dikirimkan, panggil gerbang pengaman
        if (!$request->has('konfirmasi_no_hp')) {
            return view('auth_action', compact('booking', 'actionType'));
        }

        // Jika nomor HP salah, gagalkan aksi dan lempar kembali ke jadwal
        if ($request->konfirmasi_no_hp !== $booking->no_hp) {
            return redirect()->route('futsal.jadwal')->with('error', 'Akses Ditolak! Nomor WhatsApp tidak cocok dengan pemilik tim.');
        }

        return view('edit_jadwal', compact('booking'));
    }

    // Eksekusi Update Data ke Database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'no_hp' => 'required|string',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->only(['nama_tim', 'jam_mulai', 'jam_selesai', 'no_hp']));

        return redirect()->route('futsal.jadwal')->with('success', 'Jadwal tanding tim berhasil diperbarui!');
    }

    // Eksekusi Pembatalan/Hapus Booking dari Database
    public function destroy(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        if ($request->konfirmasi_no_hp !== $booking->no_hp) {
            return redirect()->route('futsal.jadwal')->with('error', 'Gagal membatalkan! Nomor WhatsApp salah.');
        }

        $booking->delete();
        return redirect()->route('futsal.jadwal')->with('success', 'Booking lapangan berhasil dibatalkan.');
    }
}
