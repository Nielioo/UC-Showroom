<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Kendaraan;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_order_can_be_created()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a Customer
        $customer = Customer::factory()->create();

        // Create a Kendaraan
        $kendaraan = Kendaraan::factory()->create();

        // Now perform the test
        $response = $this->post('/orders', [
            'customer_id' => $customer->id,
            'kendaraan_id' => $kendaraan->id,
            'jumlah_pesanan' => '2',
        ]);

        $response->assertRedirect('/orders');

        // Assert an Order was created
        $this->assertCount(1, Order::all());
    }

    /** @test */
    public function an_order_can_be_updated()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a Customer
        $customer = Customer::factory()->create();

        // Create a Kendaraan
        $kendaraan = Kendaraan::factory()->create();

        // Create an Order
        $order = Order::factory()->create([
            'customer_id' => $customer->id,
            'kendaraan_id' => $kendaraan->id,
        ]);

        // Now perform the test
        $response = $this->put('/orders/' . $order->id, [
            'customer_id' => $customer->id,
            'kendaraan_id' => $kendaraan->id,
            'jumlah_pesanan' => '3',
        ]);

        $response->assertRedirect('/orders');

        // Assert the Order was updated
        $this->assertEquals('3', Order::first()->jumlah_pesanan);
    }

    /** @test */
    public function an_order_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a Customer
        $customer = Customer::factory()->create();

        // Create a Kendaraan
        $kendaraan = Kendaraan::factory()->create();

        // Create an Order
        $order = Order::factory()->create([
            'customer_id' => $customer->id,
            'kendaraan_id' => $kendaraan->id,
        ]);

        // Now perform the test
        $response = $this->delete('/orders/' . $order->id);

        $response->assertRedirect('/orders');

        // Assert the Order was deleted
        $this->assertCount(0, Order::all());
    }

}
