<?php

namespace Database\Seeders;

use App\Models\pendaftar_rtlh;
use Illuminate\Database\Seeder;

class pendaftar_rtlhseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pendaftar_rtlh::insert([
            [
                'no_kk'=> '2172021612900001',
                'nik'=> '2172021612900711',
                'nama'=> 'Budi',
                'alamat'=> 'Jalan Peralatan',
                'kelurahan_id'=> 2172020005,
                'status'=> 0,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
