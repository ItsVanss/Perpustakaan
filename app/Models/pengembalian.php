<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'pinjaman_id',
        'tanggal_id',
        'user_id',
    ];
}
