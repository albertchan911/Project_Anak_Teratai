<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'nilai_rata_rata', 'semester', 'catatan','kelas'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
