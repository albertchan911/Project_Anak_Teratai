<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('nilais', function (Blueprint $table) {
        $table->integer('kelas'); // Kolom kelas dengan tipe integer
    });
}

public function down()
{
    Schema::table('nilais', function (Blueprint $table) {
        $table->dropColumn('kelas'); // Menghapus kolom kelas jika migrasi dibatalkan
    });
}

};
