<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarangKeluarExport implements FromView
{
    protected $barangkeluar;
    public function __construct($barangkeluar)
    {
        $this->barangkeluar = $barangkeluar;
    }
    public function view(): View
    {
        return view('exports.laporan-barang-keluar', [
            'barangkeluar' => $this->barangkeluar
        ]);
    }
}
