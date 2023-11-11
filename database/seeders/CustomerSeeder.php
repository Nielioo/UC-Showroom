<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'nama' => 'Guest',
                'id_card' => '1234567890123456',
                'alamat' => 'Jl. Guest',
                'no_telepon' => '081234567890',
            ],
            [
                'nama' => 'Customer',
                'id_card' => '1234567890123457',
                'alamat' => 'Jl. Customer',
                'no_telepon' => '081234567891',
            ],
        ]);
    }
}
