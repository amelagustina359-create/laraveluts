<?php
namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('masyarakat.index', compact('masyarakat'));
    }

    public function create()
    {
        return view('masyarakat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:masyarakat,nik',
            'nama' => 'required',
            'username' => 'required|unique:masyarakat,username',
            'password' => 'required|min:6',
            'telp' => 'nullable',
        ]);

        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
        ]);

        return redirect()->route('masyarakat.index')->with('success', 'Data masyarakat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        return view('masyarakat.edit', compact('masyarakat'));
    }

    public function update(Request $request, $id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        $request->validate([
            'nik' => 'required|unique:masyarakat,nik,' . $id,
            'nama' => 'required',
            'username' => 'required|unique:masyarakat,username,' . $id,
            'telp' => 'nullable',
        ]);

        $masyarakat->update($request->all());

        return redirect()->route('masyarakat.index')->with('success', 'Data masyarakat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        $masyarakat->delete();

        return redirect()->route('masyarakat.index')->with('success', 'Data masyarakat berhasil dihapus!');
    }
}


    

