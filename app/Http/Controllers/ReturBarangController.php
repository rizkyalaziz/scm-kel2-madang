<?php
namespace App\Http\Controllers;

use App\Models\ReturBarang;
use Illuminate\Http\Request;
use App\Exports\ReturBarangExport;
use Maatwebsite\Excel\Facades\Excel;

class ReturBarangController extends Controller
{
    public function index()
    {
        $retur = ReturBarang::all();
        return view('returbarang', compact('retur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable',
            'tanggal_retur' => 'required|date',
            'cabang' => 'nullable',
            'stokker' => 'nullable',
        ]);
        ReturBarang::create($request->all());
        return redirect()->route('returbarang')->with('success', 'Data retur berhasil ditambahkan!');
    }

    public function laporan(Request $request)
    {
        $query = ReturBarang::query();
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_retur', [$request->tanggal_awal, $request->tanggal_akhir]);
        }
        $retur = $query->get();
        return view('laporan-retur', compact('retur'));
    }

    public function exportExcel(Request $request)
    {
        $query = \App\Models\ReturBarang::query();
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_retur', [$request->tanggal_awal, $request->tanggal_akhir]);
        }
        $retur = $query->get();
        $export = new ReturBarangExport($retur);
        return Excel::download($export, 'laporan-retur.xlsx');
    }
}
