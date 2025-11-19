<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index() {
        // ambil semua pengaduan terbaru dulu
        $pengaduan = \App\Models\Pengaduan::orderBy('created_at', 'desc')->get();

        // Tampilkan view index yang sudah dibuat di resources/views/pengaduan/index.blade.php
        return view('pengaduan.index', compact('pengaduan'));
    }
}

