<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::all();
        return view('satuan', compact('satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        Satuan::create(['nama' => $request->nama]);
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        $satuan = Satuan::findOrFail($id);
        $satuan->update(['nama' => $request->nama]);
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus!');
    }
}
