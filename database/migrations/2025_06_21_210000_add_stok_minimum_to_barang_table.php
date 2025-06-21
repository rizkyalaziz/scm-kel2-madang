<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->integer('stok_minimum')->default(0)->after('jumlah_stok');
        });
    }

    public function down()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropColumn('stok_minimum');
        });
    }
};
