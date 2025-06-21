<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Databarang;
use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Exports\BarangKeluarExport;
use Maatwebsite\Excel\Facades\Excel;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangkeluar = BarangKeluar::with(['databarang.satuan', 'satuan'])->get();
        $databarang = Databarang::all();
        $satuan = Satuan::all();
        return view('barangkeluar', compact('barangkeluar', 'databarang', 'satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'databarang_id' => 'required|exists:barang,id',
            'satuan_id' => 'required|exists:satuan,id',
            'stok' => 'required|integer|min:0',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'sisa_stok' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $barang = Databarang::find($request->databarang_id);
        if (!$barang || $barang->jumlah_stok === null) {
            return back()->withErrors(['stok' => 'Stok barang tidak tersedia.'])->withInput();
        }
        if ($request->jumlah_keluar > $barang->jumlah_stok) {
            return back()->withErrors(['jumlah_keluar' => 'Jumlah keluar melebihi stok yang tersedia.'])->withInput();
        }
        $data = [
            'databarang_id' => $barang->id,
            'satuan_id' => $barang->satuan_id,
            'nama_barang' => $barang->nama,
            'stok' => $barang->jumlah_stok,
            'jumlah_keluar' => $request->jumlah_keluar,
            'sisa_stok' => $barang->jumlah_stok - $request->jumlah_keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ];
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barangkeluar', 'public');
        }
        BarangKeluar::create($data);
        // Update stok barang
        $barang->jumlah_stok -= $request->jumlah_keluar;
        if ($barang->jumlah_stok < 0) $barang->jumlah_stok = 0;
        $barang->save();
        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $request->validate([
            'databarang_id' => 'required|exists:barang,id',
            'satuan_id' => 'required|exists:satuan,id',
            'stok' => 'required|integer|min:0',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'sisa_stok' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $barang = Databarang::find($request->databarang_id);
        if (!$barang || $barang->jumlah_stok === null) {
            return back()->withErrors(['stok' => 'Stok barang tidak tersedia.'])->withInput();
        }
        if ($request->jumlah_keluar > $barang->jumlah_stok) {
            return back()->withErrors(['jumlah_keluar' => 'Jumlah keluar melebihi stok yang tersedia.'])->withInput();
        }
        $data = [
            'databarang_id' => $barang->id,
            'satuan_id' => $barang->satuan_id,
            'nama_barang' => $barang->nama,
            'stok' => $barang->jumlah_stok,
            'jumlah_keluar' => $request->jumlah_keluar,
            'sisa_stok' => $barang->jumlah_stok - $request->jumlah_keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ];
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
