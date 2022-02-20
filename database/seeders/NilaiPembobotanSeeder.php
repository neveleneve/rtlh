<?php

namespace Database\Seeders;

use App\Models\nilai_pembobotan;
use Illuminate\Database\Seeder;

class NilaiPembobotanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        nilai_pembobotan::insert([
            [
                'id_pembobotan' => 1,
                'nama' => 'genteng',
                'value' => 1,
            ],
            [
                'id_pembobotan' => 1,
                'nama' => 'bambu',
                'value' => 2,
            ],
            [
                'id_pembobotan' => 1,
                'nama' => 'ijuk',
                'value' => 3,
            ],
            [
                'id_pembobotan' => 2,
                'nama' => 'papan',
                'value' => 1,
            ],
            [
                'id_pembobotan' => 2,
                'nama' => 'bambu',
                'value' => 2,
            ],
            [
                'id_pembobotan' => 2,
                'nama' => 'ilalang',
                'value' => 3,
            ],
            [
                'id_pembobotan' => 3,
                'nama' => 'milik sendiri',
                'value' => 1,
            ],
            [
                'id_pembobotan' => 3,
                'nama' => 'sewa',
                'value' => 2,
            ],
            [
                'id_pembobotan' => 3,
                'nama' => 'wakaf',
                'value' => 3,
            ],
            [
                'id_pembobotan' => 4,
                'nama' => 'keramik',
                'value' => 1,
            ],
            [
                'id_pembobotan' => 4,
                'nama' => 'plester',
                'value' => 2,
            ],
            [
                'id_pembobotan' => 4,
                'nama' => 'tanah',
                'value' => 3,
            ],
            [
                'id_pembobotan' => 5,
                'nama' => 'ada',
                'value' => 1,
            ],
            [
                'id_pembobotan' => 5,
                'nama' => 'tidak ada',
                'value' => 2,
            ],
            [
                'id_pembobotan' => 6,
                'nama' => 'ada',
                'value' => 1,
            ],
            [
                'id_pembobotan' => 6,
                'nama' => 'tidak ada',
                'value' => 2,
            ],
            [
                'id_pembobotan' => 7,
                'nama' => 'ada',
                'value' => 1,
            ],
            [
                'id_pembobotan' => 7,
                'nama' => 'tidak ada',
                'value' => 2,
            ],
        ]);
    }
}
