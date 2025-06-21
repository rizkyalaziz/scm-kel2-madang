<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->integer('jumlah_keluar')->after('stok')->default(0);
            $table->dropColumn('jumlah'); // jika kolom jumlah masih ada dan tidak dipakai
        });
    }

    public function down(): void
    {
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->dropColumn('jumlah_keluar');
            $table->integer('jumlah')->nullable(); // restore jika perlu
        });
    }
};
