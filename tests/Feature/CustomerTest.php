<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_customer_can_be_created()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Now perform the test
        $response = $this->post('/customers', [
            'nama' => 'Test Customer',
            'id_card' => '1234567890123456',
            'alamat' => 'Test Address',
            'no_telepon' => '1234567890',
        ]);

        $response->assertRedirect('/customers');

        $this->assertCount(1, Customer::all());
    }

    /** @test */
    public function a_customer_can_be_updated()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $this->post('/customers', [
            'nama' => 'Test Customer',
            'id_card' => '1234567890123456',
            'alamat' => 'Test Address',
            'no_telepon' => '1234567890',
        ]);

        $customer = Customer::first();

        $response = $this->patch('/customers/' . $customer->id, [
            'nama' => 'New Name',
            'id_card' => '1234567890123456',
            'alamat' => 'New Address',
            'no_telepon' => '0987654321',
        ]);

        $response->assertRedirect('/customers');

        $this->assertEquals('New Name', Customer::first()->nama);
        $this->assertEquals('New Address', Customer::first()->alamat);
        $this->assertEquals('0987654321', Customer::first()->no_telepon);
    }

    /** @test */
    public function a_customer_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $this->post('/customers', [
            'nama' => 'Test Customer',
            'id_card' => '1234567890123456',
            'alamat' => 'Test Address',
            'no_telepon' => '1234567890',
        ]);

        $customer = Customer::first();

        $response = $this->delete('/customers/' . $customer->id);

        $response->assertRedirect('/customers');

        $this->assertCount(0, Customer::all());
    }

}
