<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambah data pengguna dummy
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
            'he_qi' => json_encode(['Barat 1', 'Barat 2', 'Utara 1', 'Utara 2', 'Tangerang', 'Timur', 'Pusat', 'Cikarang']), // Superadmin dapat mengakses semua He Qi
        ]);

        User::create([
            'name' => 'Rina',
            'email' => 'rina@tzuchi.or.id',
            'password' => Hash::make('admin123'),
            'role' => 'staff',
            'he_qi' => json_encode(['Utara 1', 'Utara 2', 'Tangerang']),
        ]);

        User::create([
            'name' => 'Adit',
            'email' => 'adit@tzuchi.or.id',
            'password' => Hash::make('admin123'),
            'role' => 'staff',
            'he_qi' => json_encode(['Timur', 'Cikarang']),
        ]);

        User::create([
            'name' => 'Albert',
            'email' => 'albert.chandra@tzuchi.or.id',
            'password' => Hash::make('admin123'),
            'role' => 'staff',
            'he_qi' => json_encode(['Barat 1', 'Barat 2']),
        ]);

        User::create([
            'name' => 'Kristin',
            'email' => 'kristin.bahyu@tzuchi.or.id',
            'password' => Hash::make('admin123'),
            'role' => 'staff',
            'he_qi' => json_encode(['Pusat', 'Barat 1']),
        ]);

        User::create([
            'name' => 'Relawan Utara 1',
            'email' => 'utara1@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Utara 1']),
        ]);

        User::create([
            'name' => 'Relawan Utara 2',
            'email' => 'utara2@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Utara 2']),
        ]);

        User::create([
            'name' => 'Relawan Pusat',
            'email' => 'pusat@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Pusat']),
        ]);

        User::create([
            'name' => 'Relawan Barat 1',
            'email' => 'barat1@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Barat 1']),
        ]);

        User::create([
            'name' => 'Relawan Barat 2',
            'email' => 'barat2@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Barat 2']),
        ]);

        User::create([
            'name' => 'Relawan Timur',
            'email' => 'timur@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Timur']),
        ]);

        User::create([
            'name' => 'Relawan Cikarang',
            'email' => 'cikarang@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Cikarang']),
        ]);

        User::create([
            'name' => 'Relawan Tangerang',
            'email' => 'tangerang@tzuchi.or.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'he_qi' => json_encode(['Tangerang']),
        ]);
    }
}
