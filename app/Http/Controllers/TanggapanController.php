<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index()
    {
        // ambil semua tanggapan beserta pengaduannya (jika ada)
        $tanggapan = Tanggapan::with('pengaduan')->get();

        // kirim data ke view tanggapan.index
        return view('tanggapan.index', compact('tanggapan'));
    }
    public function create($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('tanggapan_masyarakat.create');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'petugas' => 'required',
            'isi_tanggapan' => 'required'
        ]);

        Tanggapan::create([
            'pengaduan_id' => $id,
            'petugas' => $request->petugas,
            'isi_tanggapan' => $request->isi_tanggapan,
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Tanggapan berhasil dikirim!');
    }
}