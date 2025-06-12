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
Schema::create('nilais', function (Blueprint $table) {
    $table->id();
    $table->foreignId('siswa_id')->constrained()->onDelete('cascade'); // Relasi ke siswa
    $table->decimal('nilai_rata_rata', 5, 2); // Nilai rata-rata
    $table->enum('semester', ['Semester 1', 'Semester 2']); // Pilihan semester
    $table->text('catatan'); // Catatan untuk siswa
    $table->integer('kelas'); // Kolom kelas dengan tipe integer
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
