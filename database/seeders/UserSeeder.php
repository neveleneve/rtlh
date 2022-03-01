<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => "Admin Provinsi Kepulauan Riau",
                'username' => "adminprovinsikepulauanriau",
                'email_verified_at' => null,
                'password' => Hash::make('adminprovinsikepulauanriau'),
                'level' => 0,
                'daerah_id' => 21,
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => "Admin Provinsi Kepulauan Riau - Kota Tanjungpinang",
                'username' => "adminkotatanjungpinang",
                'email_verified_at' => null,
                'password' => Hash::make('adminkotatanjungpinang'),
                'level' => 1,
                'daerah_id' => 2172,
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
