<?php
namespace App\Http\Controllers;

use App\Models\ReturBarang;
use Illuminate\Http\Request;

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
}
