<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Daniel Aprillio',
                'email' => 'daniel@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Guest',
                'email' => 'guest@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Petugas Showroom',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('12345678'),
            ],
        ]);
    }
}
