<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\File;

class ContactController extends Controller

{
<<<<<<< HEAD
   public function index()
{
    // Ambil semua data pesan terbaru
    $pesan = Contact::latest()->get();

    // Tampilkan view pesan.blade.php (halaman daftar pesan)
    return view('pesan', compact('pesan'));
}

=======
    public function index()
    {
        return view('kontak'); // halaman form kontak
    }
>>>>>>> 59dc0fed06c2631592220246925212674536abf8

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'nullable',
            'pesan' => 'required',
        ]);

<<<<<<< HEAD
        // Tambahkan user_id (nullable)
        $data['user_id'] = null;

        Contact::create($data);

=======
        $file = storage_path('app/contacts.json');
        $all = [];

        if (File::exists($file)) {
            $all = json_decode(File::get($file), true) ?: [];
        }

        $all[] = array_merge($data, [
            'created_at' => now()->toDateTimeString()
        ]);

        File::put($file, json_encode($all, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // redirect langsung ke halaman pesan terkirim
>>>>>>> 59dc0fed06c2631592220246925212674536abf8
        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dikirim.');
    }
}
