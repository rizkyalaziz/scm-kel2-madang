<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Databarang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuk = BarangMasuk::with('databarang')->get();
        $databarang = Databarang::all();
        return view('barangmasuk', compact('barangmasuk', 'databarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'databarang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barangmasuk', 'public');
        }
        BarangMasuk::create($data);
        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $request->validate([
            'databarang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);
        $barangmasuk->update($request->all());
        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil dihapus!');
    }
}
