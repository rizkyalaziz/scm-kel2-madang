<?php
// filepath: d:\scm-kel2-madang\database\migrations\2025_06_08_000000_create_exp_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('exp', function (Blueprint $table) {
            $table->id();
            $table->string('id_barang');
            $table->string('nama_barang');
            $table->integer('stok');
            $table->string('satuan');
            $table->date('tanggal_kadaluarsa');
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exp');
    }
};
