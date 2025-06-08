<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReturBarangExport implements FromView
{
    protected $retur;
    public function __construct($retur)
    {
        $this->retur = $retur;
    }
    public function view(): View
    {
        return view('exports.laporan-retur', [
            'retur' => $this->retur
        ]);
    }
}
