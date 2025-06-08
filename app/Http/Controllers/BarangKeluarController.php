<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Databarang;
use Illuminate\Http\Request;
use App\Exports\BarangKeluarExport;
use Maatwebsite\Excel\Facades\Excel;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangkeluar = BarangKeluar::with('databarang')->get();
        $databarang = Databarang::all();
        return view('barangkeluar', compact('barangkeluar', 'databarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barangkeluar', 'public');
        }
        BarangKeluar::create($data);
        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barangkeluar', 'public');
        }
        $barangkeluar->update($data);
        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil dihapus!');
    }

    public function laporan(Request $request)
    {
        $query = \App\Models\BarangKeluar::with(['databarang', 'databarang.satuan']);
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_keluar', [$request->tanggal_awal, $request->tanggal_akhir]);
        }
        $barangkeluar = $query->get();
        return view('laporan-keluar', compact('barangkeluar'));
    }

    public function exportExcel(Request $request)
    {
        $query = \App\Models\BarangKeluar::with(['databarang', 'databarang.satuan']);
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_keluar', [$request->tanggal_awal, $request->tanggal_akhir]);
        }
        $barangkeluar = $query->get();
        $export = new BarangKeluarExport($barangkeluar);
        return Excel::download($export, 'laporan-barang-keluar.xlsx');
    }
}
