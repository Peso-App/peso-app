<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Dwi Fahriza',
            'email' => 'dwifahriza@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Riswan Gani',
            'email' => 'riswangani11@gmail.com',
            'address' => 'Jl Dago BBL',
            'provinsi' => 'Jawa Barat',
            'kab_kota' => 'Bandung',
            'password' => Hash::make('admin'),
        ]);
    }
}
