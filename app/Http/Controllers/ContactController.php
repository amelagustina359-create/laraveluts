<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontak'); // jangan kirim $pesan ke view kontak
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
        $all[] = array_merge($data, ['created_at' => now()->toDateTimeString()]);
        File::put($file, json_encode($all, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));

        return redirect()->route('home')->with('success','Pesan berhasil dikirim.');
    }
}