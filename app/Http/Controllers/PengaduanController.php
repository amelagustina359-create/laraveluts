<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        // ambil semua pengaduan terbaru
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();

        // pastikan nama view sesuai: gunakan 'pengaduan.daftar-pengaduan' jika file itu yang Anda pakai
        return view('pengaduan.daftar-pengaduan', compact('pengaduan'));
    }

    // Halaman admin untuk petugas melihat semua pengaduan
    public function adminIndex()
    {
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('admin.pengaduan_index', compact('pengaduan'));
    }

    /**
     * Tampilkan form pengaduan baru
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Simpan pengaduan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'kategori' => ['required', 'string', 'max:100'],
            'isi_pengaduan' => ['required', 'string'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'tanggal_perjalanan' => ['nullable', 'date'],
            'lampiran' => ['nullable', 'image', 'max:2048'],
        ]);

        // Tangani upload jika ada
        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('lampiran', 'public');
            $validated['lampiran'] = $path;
        }

        Pengaduan::create($validated);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }
    public function edit($id)
{
    $data = Pengaduan::findOrFail($id);
    return view('admin.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $data = Pengaduan::findOrFail($id);
    $data->update($request->all());

    return redirect()->route('pesan.index')->with('success', 'Data berhasil diupdate');
}

public function destroy($id)
{
    $data = Pengaduan::findOrFail($id);
    $data->delete();

    return redirect()->route('pesan.index')->with('success', 'Data berhasil dihapus');
}
}

