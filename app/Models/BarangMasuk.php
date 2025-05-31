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
        'jumlah',
        'tanggal_masuk',
        'keterangan',
        'gambar'
    ];

    public function databarang()
    {
        return $this->belongsTo(Databarang::class);
    }
}
