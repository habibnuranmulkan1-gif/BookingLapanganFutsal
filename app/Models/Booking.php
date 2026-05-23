<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Booking extends Model
{
    protected $fillable = ['user_id', 'nama_tim', 'tanggal', 'jam_mulai', 'jam_selesai', 'no_hp'];

    /**
     * Relasi: Setiap booking lapangan dimiliki oleh seorang User (jika login)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
