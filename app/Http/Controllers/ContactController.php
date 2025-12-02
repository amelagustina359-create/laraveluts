<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
   public function index()
{
    // Ambil semua data pesan terbaru
    $pesan = Contact::latest()->get();

    // Tampilkan view pesan.blade.php (halaman daftar pesan)
    return view('pesan', compact('pesan'));
}


    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'nullable',
            'pesan' => 'required',
        ]);

        // Tambahkan user_id (nullable)
        $data['user_id'] = null;

        Contact::create($data);

        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dikirim.');
    }
}
