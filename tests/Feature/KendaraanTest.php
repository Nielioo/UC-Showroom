<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_kendaraan_can_be_created()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a Mobil
        $mobil = Mobil::factory()->create();

        // Now perform the test
        $response = $this->post('/kendaraans', [
            'model' => 'Test Model',
            'tahun' => '2023',
            'jumlah_penumpang' => '4',
            'manufaktur' => 'Test Manufaktur',
            'harga' => '5000000',
            'jenis_kendaraan_id' => $mobil->id,
            'jenis_kendaraan_type' => 'App\\Models\\Mobil',
        ]);

        $response->assertRedirect('/kendaraans');

        // Create a Kendaraan
        Kendaraan::factory()->create([
            'jenis_kendaraan_id' => $mobil->id,
            'jenis_kendaraan_type' => 'App\\Models\\Mobil',
        ]);

        $this->assertCount(1, Kendaraan::all());
    }

    /** @test */
    public function a_kendaraan_can_be_updated()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a Mobil
        $mobil = Mobil::factory()->create();

        // Create a Kendaraan
        $kendaraan = Kendaraan::factory()->create([
            'jenis_kendaraan_id' => $mobil->id,
            'jenis_kendaraan_type' => 'App\\Models\\Mobil',
        ]);

        // Now perform the test
        $response = $this->put('/kendaraans/' . $kendaraan->id, [
            'model' => 'Updated Model',
            'tahun' => '2024',
            'jumlah_penumpang' => '5',
            'manufaktur' => 'Updated Manufaktur',
            'harga' => '6000000',
            'jenis_kendaraan_id' => $mobil->id,
            'jenis_kendaraan_type' => 'App\\Models\\Mobil',
            'tipe_bahan_bakar' => 'Updated Bahan Bakar',
            'luas_bagasi' => 'Updated Luas Bagasi',
        ]);

        $response->assertRedirect('/kendaraans');

        // Assert the Kendaraan was updated
        $this->assertEquals('Updated Model', Kendaraan::first()->model);
    }

    /** @test */
    public function a_kendaraan_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a Mobil
        $mobil = Mobil::factory()->create();

        // Create a Kendaraan
        $kendaraan = Kendaraan::factory()->create([
            'jenis_kendaraan_id' => $mobil->id,
            'jenis_kendaraan_type' => 'App\\Models\\Mobil',
        ]);

        // Now perform the test
        $response = $this->delete('/kendaraans/' . $kendaraan->id);

        $response->assertRedirect('/kendaraans');

        // Assert the Kendaraan was deleted
        $this->assertCount(0, Kendaraan::all());
    }

}
