<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'jumlah_pesanan' => 1,
                'customer_id' => '1',
                'kendaraan_id' => '1',
            ],
            [
                'jumlah_pesanan' => 2,
                'customer_id' => '1',
                'kendaraan_id' => '2',
            ],
        ]);
    }
}
