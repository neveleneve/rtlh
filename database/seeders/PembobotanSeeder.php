<?php

namespace Database\Seeders;

use App\Models\pembobotan;
use Illuminate\Database\Seeder;

class PembobotanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pembobotan::insert([
            [
                'nama' => 'Kondisi Atap Rumah',
                'sifat' => 0,
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Kondisi Dinding Rumah',
                'sifat' => 0,
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Status Kepemilikan Rumah',
                'sifat' => 0,
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Kondisi Lantai Rumah',
                'sifat' => 0,
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Ketersediaan Listrik',
                'sifat' => 0,
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Ketersediaan MCK',
                'sifat' => 0,
                'bobot' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Aset Lainnya',
                'sifat' => 0,
                'bobot' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
