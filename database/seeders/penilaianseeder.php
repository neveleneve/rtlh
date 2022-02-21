<?php

namespace Database\Seeders;

use App\Models\penilaian;
use Illuminate\Database\Seeder;

class penilaianseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        penilaian::insert([
            [
                'no_kk' => '1234567890123456',
                'id_pembobotan' => 1,
                'nilai' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'no_kk' => '1234567890123456',
                'id_pembobotan' => 2,
                'nilai' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'no_kk' => '1234567890123456',
                'id_pembobotan' => 3,
                'nilai' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'no_kk' => '1234567890123456',
                'id_pembobotan' => 4,
                'nilai' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'no_kk' => '1234567890123456',
                'id_pembobotan' => 5,
                'nilai' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'no_kk' => '1234567890123456',
                'id_pembobotan' => 6,
                'nilai' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'no_kk' => '1234567890123456',
                'id_pembobotan' => 7,
                'nilai' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
