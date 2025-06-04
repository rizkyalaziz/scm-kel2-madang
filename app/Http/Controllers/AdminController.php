<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Databarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class AdminController extends Controller
{
    function index (){
        $stok_terendah = Databarang::with(['satuan','kategori','jenis'])
            ->orderBy('stok', 'asc')->limit(5)->get();
        $barang_masuk_terbaru = BarangMasuk::with(['databarang','satuan'])
            ->orderBy('tanggal_masuk','desc')->limit(5)->get();
        $barang_keluar_terbaru = BarangKeluar::orderBy('tanggal_keluar','desc')->limit(5)->get();
        return view('dashboard', compact('stok_terendah', 'barang_masuk_terbaru', 'barang_keluar_terbaru'));
    }
}
