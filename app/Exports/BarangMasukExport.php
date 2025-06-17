<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarangMasukExport implements FromView
{
    protected $barangmasuk;
    public function __construct($barangmasuk)
    {
        $this->barangmasuk = $barangmasuk;
    }
    public function view(): View
    {
        return view('exports.laporan-barang-masuk', [
            'barangmasuk' => $this->barangmasuk
        ]);
    }
}
