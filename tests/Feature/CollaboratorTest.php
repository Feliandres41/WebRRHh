<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class CollaboratorTest extends TestCase
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

    public function test_puede_listar_colaboradores()
    {
        $response = $this->get('/collaborators');

        $response->assertStatus(200);
    }

    public function test_puede_ver_un_colaborador()
    {
        $response = $this->get('/collaborators/1');

        $response->assertStatus(200);
    }

    public function test_puede_crear_colaborador()
    {
        $response = $this->post('/collaborators', [
            'name' => 'Juan Perez'
        ]);

        $response->assertStatus(201);
    }

    public function test_falla_validacion_cuando_faltan_datos()
    {
        $response = $this->post('/collaborators', []);

        $response->assertStatus(422);
    }

    public function test_puede_actualizar_colaborador()
    {
        $response = $this->put('/collaborators/1', [
            'name' => 'Juan actualizado'
        ]);

        $response->assertStatus(200);
    }

    public function test_puede_eliminar_colaborador()
    {
        $response = $this->delete('/collaborators/1');

        $response->assertStatus(200);
    }

    public function test_puede_desactivar_colaborador()
    {
        $response = $this->patch('/collaborators/1/deactivate');

        $response->assertStatus(200);
    }
}