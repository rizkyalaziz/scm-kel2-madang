<?php

namespace App\Http\Controllers;

use App\Models\Databarang;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Databarang::with(['kategori', 'jenis', 'satuan'])->get();
        $barang_minimum = Databarang::whereColumn('jumlah_stok', '<=', 'stok_minimum')->get();
        $jumlah_notif = $barang_minimum->count();
        $kategori_count = \App\Models\Kategori::count();
        $jenis_count = \App\Models\Jenis::count();
        $satuan_count = \App\Models\Satuan::count();
        return view('dashboard', compact('barang', 'barang_minimum', 'jumlah_notif', 'kategori_count', 'jenis_count', 'satuan_count'));
    }
}
