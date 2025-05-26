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
        Schema::create('catatan_anak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade'); // Relasi ke tabel siswa
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel user (relawan atau staff)
            $table->text('isi_catatan');
            $table->date('tanggal_catatan');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_anaks');
    }
};
