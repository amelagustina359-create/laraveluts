<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'kategori_id',
        'kategori',
        'isi_pengaduan',
        'lokasi',
        'tanggal_perjalanan',
        'lampiran',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id');
    }
}

