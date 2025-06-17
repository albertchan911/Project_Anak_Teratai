<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi menggunakan mass assignment
    protected $fillable = [
        'nama', 'tanggal_lahir', 'kelas', 'sekolah', 'he_qi', 'foto_siswa', 'tanggal_dibantu', // tambahkan kolom baru
    ];

    public function catatanAnak()
    {
        return $this->hasMany(CatatanAnak::class, 'siswa_id');
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    // Relasi: Satu siswa bisa memiliki banyak penyaluran bantuan
    public function penyaluranBantuan()
    {
        return $this->hasMany(PenyaluranBantuan::class);
    }

}