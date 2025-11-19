<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontak'); // pastikan resources/views/contact.blade.php ada
    }

    public function store(Request $request)
    {
        // validasi singkat
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // simpan / kirim / log sesuai kebutuhan
        // contoh: simpan ke storage/app/contacts.json atau kirim email

        return redirect()->route('home')->with('success', 'Pesan berhasil dikirim.');
    }
}