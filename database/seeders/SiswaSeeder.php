<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Daftar he_qi
        $he_qis = [
            "Barat 1", "Barat 2", "Utara 1", "Utara 2", "Tangerang", "Timur", "Pusat", "Cikarang"
        ];

        // Jumlah siswa per kelas per he_qi
        $jumlah_siswa_per_kelas = [
            1 => 2,   // 2 siswa untuk kelas 1
            2 => 1,   // 1 siswa untuk kelas 2
            3 => 5,   // 5 siswa untuk kelas 3
            4 => 3,   // 3 siswa untuk kelas 4
            5 => 4,   // 4 siswa untuk kelas 5
            6 => 6,   // 6 siswa untuk kelas 6
            7 => 4,   // 4 siswa untuk kelas 7
            8 => 3,   // 3 siswa untuk kelas 8
            9 => 5,   // 5 siswa untuk kelas 9
            10 => 2,  // 2 siswa untuk kelas 10
            11 => 7,  // 7 siswa untuk kelas 11
            12 => 3,  // 3 siswa untuk kelas 12
        ];

        // Daftar awalan sekolah
        $awalanSekolah = ['SD', 'SMP', 'SMA', 'SMK'];

        // Loop untuk setiap he_qi
        foreach ($he_qis as $index => $he_qi) {
            // Untuk setiap kelas 1 hingga 12
            for ($kelasNo = 1; $kelasNo <= 12; $kelasNo++) {
                // Mendapatkan jumlah siswa per kelas untuk he_qi ini
                $jumlahSiswa = $jumlah_siswa_per_kelas[$kelasNo];

                // Membuat siswa untuk kelas tersebut
                for ($i = 0; $i < $jumlahSiswa; $i++) {
                    // Pilih awalan sekolah secara acak
                    $sekolahAwalan = $awalanSekolah[array_rand($awalanSekolah)];

                    DB::table('siswas')->insert([
                        'nama' => $faker->name,
                        'tanggal_lahir' => $faker->date('Y-m-d'),
                        'kelas' => $kelasNo,
                        'sekolah' => $sekolahAwalan . ' ' . $faker->company, // Menambahkan awalan sekolah
                        'he_qi' => $he_qi,  // Menetapkan he_qi yang sesuai
                        'foto_siswa' => 'photos/' . $faker->uuid . '.jpg', // Menambahkan foto siswa
                        'tanggal_dibantu' => $faker->date('Y-m-d'),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }


}
