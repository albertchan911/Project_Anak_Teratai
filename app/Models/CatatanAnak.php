<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanAnak extends Model
{
    use HasFactory;

    protected $table = 'catatan_anak';

    protected $fillable = [
        'siswa_id', 'user_id', 'isi_catatan', 'tanggal_catatan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

