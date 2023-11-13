<?php

namespace Database\Factories;

use App\Models\Mobil;
use Illuminate\Database\Eloquent\Factories\Factory;

class MobilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mobil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipe_bahan_bakar' => $this->faker->word,
            'luas_bagasi' => $this->faker->randomNumber(3),
        ];
    }
}
