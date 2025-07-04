<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databarang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
    'id_barang', 'nama', 'kode', 'kategori_id', 'jenis_id', 'jumlah_stok', 'satuan_id', 'stok_minimum', 'gambar'
];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
