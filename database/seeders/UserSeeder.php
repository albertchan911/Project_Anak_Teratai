<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambah data pengguna dummy
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
            'he_qi' => json_encode(['Barat', 'Utara', 'Tangerang', 'Timur', 'Pusat']), // Superadmin dapat mengakses semua He Qi
        ]);

        User::create([
            'name' => 'Staff Utara',
            'email' => 'Staff@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'he_qi' => json_encode(['Utara']),
        ]);

        User::create([
            'name' => 'Relawan',
            'email' => 'Relawan@example.com',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Utara']),
        ]);
    }
}
