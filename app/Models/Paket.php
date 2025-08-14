<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_penerima',
        'nama_pengirim',
        'kontak_pengirim', // Tambahkan ini
        'alamat_pengirim', // Tambahkan ini
        'foto_paket',
        'ekspedisi',
        'waktu_tiba',
        'status',
        'waktu_diambil',
        'nama_pengambil',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'waktu_tiba' => 'datetime',
        'waktu_diambil' => 'datetime',
    ];
}