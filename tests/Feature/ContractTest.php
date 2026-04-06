<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class ContractTest extends TestCase
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

    public function test_puede_listar_contratos()
    {
        $response = $this->get('/contracts');

        $response->assertStatus(200);
    }

    public function test_puede_ver_formulario_de_contrato()
    {
        $response = $this->get('/contracts/create');

        $response->assertStatus(200);
    }

    public function test_puede_guardar_contrato()
    {
        $response = $this->post('/contracts', [
            'type' => 'fixed',
            'start_date' => '2025-01-01'
        ]);

        $response->assertStatus(201);
    }

    public function test_falla_validacion_de_contrato()
    {
        $response = $this->post('/contracts', []);

        $response->assertStatus(422);
    }
}