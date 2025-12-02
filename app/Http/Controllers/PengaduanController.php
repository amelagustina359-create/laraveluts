<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('lampiran')){
            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }
        Pengaduan::create($data);
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('lampiran')){
            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }
        $pengaduan->update($data);
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diupdate');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus');
    }
}
