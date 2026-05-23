<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Mengizinkan kolom disimpan secara massal oleh Eloquent::create()
    protected $fillable = ['user_id', 'nama_tim', 'tanggal', 'jam_mulai', 'jam_selesai', 'no_hp'];
}
