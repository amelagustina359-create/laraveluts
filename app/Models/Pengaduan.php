<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'kategori',
        'lokasi',
        'tanggal_perjalanan',
        'isi_pengaduan',
        'lampiran'
    ];
}
