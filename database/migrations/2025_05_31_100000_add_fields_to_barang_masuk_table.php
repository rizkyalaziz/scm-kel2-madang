<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->unsignedBigInteger('satuan_id')->nullable()->after('databarang_id');
            $table->integer('stok')->nullable()->after('satuan_id');
            $table->integer('jumlah_masuk')->nullable()->after('stok');
            $table->integer('sisa_stok')->nullable()->after('jumlah_masuk');
            $table->foreign('satuan_id')->references('id')->on('satuan')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->dropForeign(['satuan_id']);
            $table->dropColumn(['satuan_id', 'stok', 'jumlah_masuk', 'sisa_stok']);
        });
    }
};
