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
                'no_kk'=> '1234567890123456',
                'nik'=> '1234567890123233',
                'nama'=> 'Budi',
                'alamat'=> 'Jalan Peralatan',
                'status'=> 0,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
