<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('retur_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->date('tanggal_retur');
            $table->string('cabang')->nullable();
            $table->string('stokker')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('retur_barang');
    }
};
