<?php

namespace App\Http\Controllers;

use App\Models\Databarang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Http\Request;

class DatabarangController extends Controller
{
    public function index()
    {
        $barang = Databarang::with(['kategori', 'jenis', 'satuan'])->get();
        $kategori = Kategori::all();
        $jenis = \App\Models\Jenis::all();
        $satuan = Satuan::all();
        $barang_minimum = Databarang::whereColumn('jumlah_stok', '<=', 'stok_minimum')->get();
        $jumlah_notif = $barang_minimum->count();
        return view('databarang', compact('barang', 'kategori', 'jenis', 'satuan', 'barang_minimum', 'jumlah_notif'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|unique:barang,id_barang',
            'nama' => 'required',
            'kode' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
            'jenis_id' => 'required|exists:jenis,id',
            'jumlah_stok' => 'required|integer',
            'satuan_id' => 'required|exists:satuan,id',
            'stok_minimum' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barang', 'public');
        }
        Databarang::create($data);
        return redirect()->route('databarang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barang = Databarang::findOrFail($id);
        $request->validate([
            'id_barang' => 'required|unique:barang,id_barang,' . $barang->id,
            'nama' => 'required',
            'kode' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
            'jenis_id' => 'required|exists:jenis,id',
            'jumlah_stok' => 'required|integer',
            'satuan_id' => 'required|exists:satuan,id',
            'stok_minimum' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barang', 'public');
        }
        $barang->update($data);
        return redirect()->route('databarang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = Databarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('databarang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
