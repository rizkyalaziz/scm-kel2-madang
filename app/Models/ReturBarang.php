<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturBarang extends Model
{
    use HasFactory;
    protected $table = 'retur_barang';
    protected $fillable = [
        'barang_id', 'nama_barang', 'jumlah', 'keterangan', 'tanggal_retur', 'cabang', 'stokker'
    ];
}
