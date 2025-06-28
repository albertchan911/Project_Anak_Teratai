<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranBantuan extends Model
{
    use HasFactory;

    protected $table = 'penyaluran_bantuan';

    protected $fillable = [
        'siswa_id',
        'jenis_bantuan',
        'jumlah',
        'keterangan',
        'tanggal',
        'kwitansi_image',
        'sekolah',
        'kelas',
        'bulan_realisasi',
        'bukti_pembayaran',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
