<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi menggunakan mass assignment
    protected $fillable = ['nama', 'tanggal_lahir', 'kelas', 'he_qi','sekolah'];

    public function catatanAnak()
    {
        return $this->hasMany(CatatanAnak::class, 'siswa_id');
    }

}
