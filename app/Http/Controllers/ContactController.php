<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller

{
    public function index()
    {
        return view('kontak'); // halaman form kontak
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'nullable',
            'pesan' => 'required',
        ]);

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
        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dikirim.');
    }
}
