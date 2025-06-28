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
    Schema::create('penyaluran_bantuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->longText('jenis_bantuan')->nullable();
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->date('tanggal');
            $table->string('kwitansi_image')->nullable();
            $table->timestamps();
            $table->string('sekolah')->nullable();
            $table->longText('bulan_realisasi')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->integer('kelas')->nullable(); // Menambahkan kolom kelas
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('penyaluran_bantuan');
    }
    
};
