<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pinjam',
        'lama_pinjam',
        'keterangan',
        'status',
        'anggota_id',
        'user_id',
    ];
}
