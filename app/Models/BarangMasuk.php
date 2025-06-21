<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = [
        'databarang_id',
        'satuan_id',
        'stok',
        'jumlah_masuk',
        'tanggal_masuk',
        'keterangan',
        'sisa_stok',
        'gambar'
    ];

    public function databarang()
    {
        return $this->belongsTo(Databarang::class, 'databarang_id');
    }
    
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
}
