<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambah data siswa dummy
        Siswa::create([
            'nama' => 'John Doe',
            'tanggal_lahir' => '2010-05-15',
            'kelas' => '5',
            'he_qi' => 'Utara', // Wilayah sesuai
        ]);

        Siswa::create([
            'nama' => 'Jane Smith',
            'tanggal_lahir' => '2009-08-20',
            'kelas' => '6',
            'he_qi' => 'Barat',
        ]);

        Siswa::create([
            'nama' => 'Sam Wilson',
            'tanggal_lahir' => '2011-02-28',
            'kelas' => '4',
            'he_qi' => 'Utara',
        ]);
    }
}
