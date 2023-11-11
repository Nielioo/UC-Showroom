<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Mobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed data for Kendaraan (parent model)
        $kendaraansData = [
            [
                'model' => 'Avanza',
                'tahun' => 2021,
                'jumlah_penumpang' => 5,
                'manufaktur' => 'Toyota',
                'harga' => 150000000,
                'jenis_kendaraan_type' => 'App\Models\Mobil',
                'jenis_kendaraan_id' => '1',
            ],
            [
                'model' => 'Xenia',
                'tahun' => 2022,
                'jumlah_penumpang' => 7,
                'manufaktur' => 'Daihatsu',
                'harga' => 180000000,
                'jenis_kendaraan_type' => 'App\Models\Mobil',
                'jenis_kendaraan_id' => '2',
            ],
            [
                'model' => 'Motor 1',
                'tahun' => 2021,
                'jumlah_penumpang' => 2,
                'manufaktur' => 'Manufaktur Motor 1',
                'harga' => 18000000,
                'jenis_kendaraan_type' => 'App\Models\Motor',
                'jenis_kendaraan_id' => '1',
            ],
            [
                'model' => 'Motor 2',
                'tahun' => 2022,
                'jumlah_penumpang' => 2,
                'manufaktur' => 'Manufaktur Motor 2',
                'harga' => 15000000,
                'jenis_kendaraan_type' => 'App\Models\Motor',
                'jenis_kendaraan_id' => '2',
            ],
            [
                'model' => 'Truck 1',
                'tahun' => 2020,
                'jumlah_penumpang' => 2,
                'manufaktur' => 'Manufaktur Truck 1',
                'harga' => 350000000,
                'jenis_kendaraan_type' => 'App\Models\Truck',
                'jenis_kendaraan_id' => '1',
            ],
            [
                'model' => 'Truck 2',
                'tahun' => 2023,
                'jumlah_penumpang' => 2,
                'manufaktur' => 'Manufaktur Truck 2',
                'harga' => 450000000,
                'jenis_kendaraan_type' => 'App\Models\Truck',
                'jenis_kendaraan_id' => '2',
            ],
        ];
        DB::table('kendaraans')->insert($kendaraansData);

        // Seed data for Mobil
        $mobilsData = [
            [
                'tipe_bahan_bakar' => 'Bensin',
                'luas_bagasi' => '200',
            ],
            [
                'tipe_bahan_bakar' => 'Solar',
                'luas_bagasi' => '250',
            ],
        ];
        DB::table('mobils')->insert($mobilsData);

        // Seed data for Motor
        $motorsData = [
            [
                'kapasitas_bensin' => '10',
                'ukuran_bagasi' => '100',
            ],
            [
                'kapasitas_bensin' => '5',
                'ukuran_bagasi' => '90',
            ],
        ];
        DB::table('motors')->insert($motorsData);

        // Seed data for Truck
        $trucksData = [
            [
                'jumlah_roda_ban' => '6',
                'luas_area_kargo' => '1000',
            ],
            [
                'jumlah_roda_ban' => '8',
                'luas_area_kargo' => '2000',
            ],
        ];
        DB::table('trucks')->insert($trucksData);

    }
}
