<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(pendaftar_rtlhseeder::class);
        $this->call(PembobotanSeeder::class);
        $this->call(NilaiPembobotanSeeder::class);
        $this->call(penilaianseeder::class);
    }
}
