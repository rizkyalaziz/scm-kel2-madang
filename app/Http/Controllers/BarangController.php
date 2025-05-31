<?php

namespace App\Http\Controllers;

use App\Models\Databarang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Databarang::with(['kategori', 'satuan'])->get();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('databarang', compact('barang', 'kategori', 'satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|unique:barang,id_barang',
            'nama' => 'required',
            'kode' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
            'stok_minimum' => 'required|integer',
            'satuan_id' => 'required|exists:satuan,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barang', 'public');
        }
        Databarang::create($data);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barang = Databarang::findOrFail($id);
        $request->validate([
            'id_barang' => 'required|unique:barang,id_barang,' . $barang->id,
            'nama' => 'required',
            'kode' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
            'stok_minimum' => 'required|integer',
            'satuan_id' => 'required|exists:satuan,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barang', 'public');
        }
        $barang->update($data);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = Databarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
