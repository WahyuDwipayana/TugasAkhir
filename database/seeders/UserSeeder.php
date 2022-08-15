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
        User::create(
            [
                'username' => 'Wahyu Dwipayana',
                'email' => 'admin@gmail.com',
                'no_telp' => '08123456789',
                'password' => Hash::make('wahyu1234'),
                'level' => 'admin'
            ],
        );
        User::create(
            [
                'username' => 'Kadek Wahyu',
                'email' => 'pegawai@gmail.com',
                'no_telp' => '081234567890',
                'password' => Hash::make('wahyu1234'),
                'level' => 'pegawai'
            ],
        );
        User::create(
            [
                'username' => 'Wahyu Dwipayana',
                'email' => 'wahyu@gmail.com',
                'no_telp' => '08123456789',
                'password' => Hash::make('wahyu1234'),
                'level' => 'user'
            ]
        );
    }
}
