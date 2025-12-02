<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Menampilkan daftar pesan (halaman admin)
    public function index()
    {
        $pesan = Contact::latest()->get();
        return view('pesan', compact('pesan'));
    }

    // Menampilkan form contact (halaman user)
    public function showForm()
    {
        return view('kontak'); // sesuaikan nama file blade kamu
    }

    // Menyimpan data pesan
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'nullable',
            'pesan' => 'required',
        ]);

        $data['user_id'] = null;

        Contact::create($data);

        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dikirim.');
    }
}