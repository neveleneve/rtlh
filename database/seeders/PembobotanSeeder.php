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
                'id_nama' => 'atap',
                'keterangan' => 'Kriteria ini menilai kondisi atap rumah pengaju.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Kondisi Dinding Rumah',
                'sifat' => 0,
                'bobot' => 3,
                'id_nama' => 'dinding',
                'keterangan' => 'Kriteria ini menilai kondisi dinding rumah pengaju.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Status Kepemilikan Rumah',
                'sifat' => 0,
                'bobot' => 4,
                'id_nama' => 'kepemilikan',
                'keterangan' => 'Kriteria ini menilai status kepemilikan rumah pengaju.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Kondisi Lantai Rumah',
                'sifat' => 0,
                'bobot' => 3,
                'id_nama' => 'lantai',
                'keterangan' => 'Kriteria ini menilai kondisi lantai rumah pengaju.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Ketersediaan Listrik',
                'sifat' => 0,
                'bobot' => 3,
                'id_nama' => 'listrik',
                'keterangan' => 'Kriteria ini menilai ketersediaan listrik di rumah pengaju.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Ketersediaan MCK',
                'sifat' => 0,
                'bobot' => 5,
                'id_nama' => 'mck',
                'keterangan' => 'Kriteria ini menilai ketersediaan Mandi, Cuci, Kakus (MCK) di rumah pengaju.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Aset Lainnya',
                'sifat' => 0,
                'bobot' => 2,
                'id_nama' => 'aset',
                'keterangan' => 'Kriteria ini menilai kepemilikan aset lain pengaju.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
