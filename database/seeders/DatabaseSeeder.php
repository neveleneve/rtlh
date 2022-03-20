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
        // $this->call(pendaftar_rtlhseeder::class);
        $this->call(PembobotanSeeder::class);
        $this->call(NilaiPembobotanSeeder::class);
        // hidupkan seeder ini jika hanya generate 1 data saja
        // $this->call(penilaianseeder::class);
        $this->call(provinsiseeder::class);
        $this->call(kotakabseeder::class);
        $this->call(kecamatanseeder::class);
        $this->call(kelurahanseeder::class);
    }
}
