<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kendaraan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model' => $this->faker->word,
            'tahun' => $this->faker->year,
            'jumlah_penumpang' => $this->faker->randomDigit,
            'manufaktur' => $this->faker->company,
            'harga' => $this->faker->randomNumber(7),
            'jenis_kendaraan_id' => $this->faker->randomDigit,
            'jenis_kendaraan_type' => $this->faker->randomElement(['App\\Models\\Mobil', 'App\\Models\\Motor', 'App\\Models\\Truck']),
        ];
    }
}
