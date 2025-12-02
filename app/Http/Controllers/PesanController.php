<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = Contact::latest()->get(); // ambil semua pesan
        return view('pesan', compact('pesan')); // admin lihat pesan
    }

    public function edit($id)
    {
        $pesan = Contact::findOrFail($id);
        return view('pesan_edit', compact('pesan'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'nullable',
            'pesan' => 'required',
        ]);

        $pesan = Contact::findOrFail($id);
        $pesan->update($data);

        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil diupdate.');
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dihapus.');
    }
}
