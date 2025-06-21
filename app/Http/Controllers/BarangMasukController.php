<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Databarang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuk = BarangMasuk::with(['databarang', 'satuan'])->get();
        $databarang = \App\Models\Databarang::all();
        $satuan = \App\Models\Satuan::all();
        return view('barangmasuk', compact('barangmasuk', 'databarang', 'satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'databarang_id' => 'required|exists:barang,id',
            'satuan_id' => 'required|exists:satuan,id',
            'stok' => 'required|integer|min:0',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'sisa_stok' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barangmasuk', 'public');
        }
        $barangMasuk = BarangMasuk::create($data);
        // Update jumlah_stok barang
        $barang = \App\Models\Databarang::find($request->databarang_id);
        if ($barang) {
            $barang->jumlah_stok += $request->jumlah_masuk;
            $barang->save();
        }
        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $request->validate([
            'databarang_id' => 'required|exists:barang,id',
            'satuan_id' => 'required|exists:satuan,id',
            'stok' => 'required|integer|min:0',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'sisa_stok' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barangmasuk', 'public');
        }
        $barangmasuk->update($data);
        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil dihapus!');
    }

    public function laporan(Request $request)
    {
        $query = BarangMasuk::with(['databarang', 'satuan']);
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_masuk', [$request->tanggal_awal, $request->tanggal_akhir]);
        }
        $barangmasuk = $query->get();
        return view('laporan-masuk', compact('barangmasuk'));
    }

    public function exportExcel(Request $request)
    {
        $query = BarangMasuk::with(['databarang', 'satuan']);
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_masuk', [$request->tanggal_awal, $request->tanggal_akhir]);
        }
        $barangmasuk = $query->get();
        $export = new \App\Exports\BarangMasukExport($barangmasuk);
        return Excel::download($export, 'laporan-barang-masuk.xlsx');
    }
}
