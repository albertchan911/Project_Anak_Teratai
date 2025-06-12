<?php

namespace Database\Seeders;

use App\Models\Users;
use App\Models\Siswas;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(SiswasSeeder::class);
    }

}
