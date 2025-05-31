<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->unsignedBigInteger('jenis_id')->nullable()->after('kategori_id');
            $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropForeign(['jenis_id']);
            $table->dropColumn('jenis_id');
        });
    }
};
