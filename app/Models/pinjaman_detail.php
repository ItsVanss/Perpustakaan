<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'pinjaman_id',
        'buku_id',
        'jumlah',
    ];
}
