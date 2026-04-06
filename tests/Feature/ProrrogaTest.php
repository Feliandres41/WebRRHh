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

        $this->autenticarRRHH();
    }

    protected function autenticarRRHH()
    {
        Role::create([
            'name' => 'RRHH',
            'guard_name' => 'web'
        ]);

        $user = User::factory()->create();

        $user->assignRole('RRHH');

        $this->actingAs($user);
    }

    public function test_puede_ver_contratos_para_prorroga()
    {
        $response = $this->get('/contracts');

        $response->assertStatus(200);
    }

    public function test_puede_acceder_formulario_de_prorroga()
    {
        $response = $this->get('/contracts/1/extensions/create');

        $response->assertStatus(200);
    }

    public function test_puede_crear_prorroga_de_tiempo()
    {
        $response = $this->post('/contracts/1/extensions', [
            'type' => 'time',
            'new_end_date' => '2026-12-30'
        ]);

        $response->assertStatus(201);
    }

    public function test_puede_crear_prorroga_de_valor()
    {
        $response = $this->post('/contracts/1/extensions', [
            'type' => 'value',
            'value' => 500000
        ]);

        $response->assertStatus(201);
    }

    public function test_falla_validacion_de_prorroga()
    {
        $response = $this->post('/contracts/1/extensions', []);

        $response->assertStatus(422);
    }
}