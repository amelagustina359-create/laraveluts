<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    // Tampilkan semua pengaduan
    public function index()
    {
        $pengaduan = Pengaduan::latest()->get();
        return view('pengaduan.index', compact('pengaduan'));
    }

    // Form tambah pengaduan
    public function create()
    {
        return view('pengaduan.create');
    }

    // Simpan data pengaduan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'kategori' => 'required',
            'lokasi' => 'nullable',
            'tanggal_perjalanan' => 'nullable|date',
            'isi_pengaduan' => 'required',
            'lampiran' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('lampiran')) {
            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        Pengaduan::create($data);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dikirim!');
    }

    // Detail pengaduan
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.show', compact('pengaduan'));
    }

    // Form edit
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    // Update pengaduan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'kategori' => 'required',
            'isi_pengaduan' => 'required',
            'lampiran' => 'nullable|image|max:2048'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        $data = $request->all();

        // update lampiran jika ada file baru
        if ($request->hasFile('lampiran')) {
            if ($pengaduan->lampiran && file_exists(storage_path('app/public/' . $pengaduan->lampiran))) {
                unlink(storage_path('app/public/' . $pengaduan->lampiran));
            }

            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        $pengaduan->update($data);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Data pengaduan berhasil diperbarui!');
    }

    // Hapus pengaduan
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        if ($pengaduan->lampiran && file_exists(storage_path('app/public/' . $pengaduan->lampiran))) {
            unlink(storage_path('app/public/' . $pengaduan->lampiran));
        }

        $pengaduan->delete();

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus!');
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
