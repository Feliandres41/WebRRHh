<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class ProrrogaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authenticateRRHH();
    }

    protected function authenticateRRHH()
    {
        Role::create([
            'name' => 'RRHH',
            'guard_name' => 'web'
        ]);

        $user = User::factory()->create();

        $user->assignRole('RRHH');

        $this->actingAs($user);
    }

    public function test_can_view_contracts_for_extension()
    {
        $response = $this->get('/contracts');

        $response->assertStatus(200);
    }

    public function test_can_access_extension_form()
    {
        $response = $this->get('/contracts/1/extensions/create');

        $response->assertStatus(200);
    }

    public function test_can_create_time_extension()
    {
        $response = $this->post('/contracts/1/extensions', [
            'type' => 'time',
            'new_end_date' => '2026-12-30'
        ]);

        $response->assertStatus(201);
    }

    public function test_can_create_value_extension()
    {
        $response = $this->post('/contracts/1/extensions', [
            'type' => 'value',
            'value' => 500000
        ]);

        $response->assertStatus(201);
    }

    public function test_extension_validation_fails()
    {
        $response = $this->post('/contracts/1/extensions', []);

        $response->assertStatus(422);
    }
}