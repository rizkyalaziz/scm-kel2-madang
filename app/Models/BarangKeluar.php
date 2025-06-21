<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $fillable = [
        'databarang_id',
        'satuan_id',
        'stok',
        'jumlah_keluar',
        'sisa_stok',
        'tanggal_keluar',
        'keterangan',
        'gambar',
        'nama_barang', // tambahkan ini agar mass assignment bisa mengisi nama_barang
    ];

    public function databarang()
    {
        return $this->belongsTo(Databarang::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
