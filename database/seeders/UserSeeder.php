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
                'name' => "Admin PUPR",
                'username' => "adminpupr",
                'email_verified_at' => null,
                'password' => Hash::make('admin'),
                'level' => 0,
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => "Admin Tanjungpinang",
                'username' => "admintanjungpinang",
                'email_verified_at' => null,
                'password' => Hash::make('admintanjungpinang'),
                'level' => 1,
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
