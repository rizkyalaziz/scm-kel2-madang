<?php
// filepath: d:\scm-kel2-madang\app\Models\Exp.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exp extends Model
{
    use HasFactory;
    protected $table = 'exp';
    protected $fillable = [
        'id_barang', 'nama_barang', 'stok', 'satuan', 'tanggal_kadaluarsa', 'jumlah', 'keterangan', 'foto'
    ];
}
