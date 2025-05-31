<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'tanggal_keluar',
        'keterangan',
        'gambar',
    ];

    public function databarang()
    {
        return $this->belongsTo(Databarang::class);
    }
}
