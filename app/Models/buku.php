<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'judul',
        'kategori_id',
        'penerbit_id',
        'isbn',
        'pengarang',
        'jumlah_alamat',
        'stok',
        'tahun_terbit',
        'sinopsis',
        'gambar',
    ];
}
