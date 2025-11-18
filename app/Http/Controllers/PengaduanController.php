<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index() {
        // ambil semua pengaduan terbaru dulu
        $pengaduan = \App\Models\Pengaduan::orderBy('created_at', 'desc')->get();

        // pastikan nama view sesuai: gunakan 'pengaduan.daftar-pengaduan' jika file itu yang Anda pakai
        return view('pengaduan.daftar-pengaduan', compact('pengaduan'));
    }
}

