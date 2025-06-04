<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSuplier extends Model
{
    use HasFactory;

    protected $table = 'data_supliers';

    protected $fillable = [
        'nama',
        'no_telepon',
        'email',
        'alamat'
    ];
}