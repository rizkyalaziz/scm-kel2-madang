<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        return view('jenis', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);
        Jenis::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);
        $jenis = Jenis::findOrFail($id);
        $jenis->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus!');
    }
}
