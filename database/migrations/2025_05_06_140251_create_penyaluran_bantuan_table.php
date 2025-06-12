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
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->string('jenis_bantuan'); // SPP, uang pangkal, dll
            $table->integer('jumlah'); // nominal
            $table->string('keterangan')->nullable(); // misalnya bulan, semester, dll
            $table->string('sekolah');
            $table->date('tanggal');
            $table->string('kwitansi_image')->nullable(); // untuk menyimpan nama file gambar kwitansi
            $table->timestamps();
            $table->longText('bulan_realisasi')->nullable();
            $table->string('bukti_pembayaran')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('penyaluran_bantuan');
    }
    
};
