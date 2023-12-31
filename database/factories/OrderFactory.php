<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Kendaraan;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'kendaraan_id' => Kendaraan::factory(),
            'jumlah_pesanan' => $this->faker->randomNumber(2),
        ];
    }
}

