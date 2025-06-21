<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->unsignedBigInteger('databarang_id')->nullable()->after('id');
            $table->unsignedBigInteger('satuan_id')->nullable()->after('databarang_id');
            $table->integer('stok')->nullable()->after('satuan_id');
            $table->integer('sisa_stok')->nullable()->after('jumlah');
            $table->foreign('databarang_id')->references('id')->on('barang')->onDelete('set null');
            $table->foreign('satuan_id')->references('id')->on('satuan')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->dropForeign(['databarang_id']);
            $table->dropForeign(['satuan_id']);
            $table->dropColumn(['databarang_id', 'satuan_id', 'stok', 'sisa_stok']);
        });
    }
};
