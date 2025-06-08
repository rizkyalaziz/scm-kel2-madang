<?php
// filepath: d:\scm-kel2-madang\app\Http\Controllers\ExpController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exp;

class ExpController extends Controller
{
    public function index()
    {
        $exp = Exp::all();
        return view('exp', compact('exp'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time().'_'.$foto->getClientOriginalName();
            $foto->move(public_path('uploads/exp'), $fotoName);
            $validated['foto'] = $fotoName;
        }

        Exp::create($validated);
        return redirect()->back()->with('success', 'Data barang kadaluarsa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $exp = Exp::findOrFail($id);
        return response()->json($exp);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $exp = Exp::findOrFail($id);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time().'_'.$foto->getClientOriginalName();
            $foto->move(public_path('uploads/exp'), $fotoName);
            $validated['foto'] = $fotoName;
        }
        $exp->update($validated);
        return redirect()->back()->with('success', 'Data barang kadaluarsa berhasil diupdate!');
    }

    public function destroy($id)
    {
        $exp = Exp::findOrFail($id);
        $exp->delete();
        return redirect()->back()->with('success', 'Data barang kadaluarsa berhasil dihapus!');
    }
}
