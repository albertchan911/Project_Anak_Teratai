<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('kelas');
            $table->string('he_qi'); // Menyimpan wilayah He Qi (sebagai string atau JSON)
            $table->string('sekolah'); // Menyimpan nama sekolah
            $table->string('foto_siswa')->nullable(); // Menyimpan path foto siswa
            $table->date('tanggal_dibantu')->nullable(); // Tanggal siswa dibantu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
