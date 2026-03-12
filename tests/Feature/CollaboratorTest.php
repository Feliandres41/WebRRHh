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

    public function test_can_list_collaborators()
    {
        $response = $this->get('/collaborators');

        $response->assertStatus(200);
    }

    public function test_can_show_single_collaborator()
    {
        $response = $this->get('/collaborators/1');

        $response->assertStatus(200);
    }

    public function test_can_create_collaborator()
    {
        $response = $this->post('/collaborators', [
            'name' => 'Juan Perez'
        ]);

        $response->assertStatus(201);
    }

    public function test_validation_fails_when_data_missing()
    {
        $response = $this->post('/collaborators', []);

        $response->assertStatus(422);
    }

    public function test_can_update_collaborator()
    {
        $response = $this->put('/collaborators/1', [
            'name' => 'Juan actualizado'
        ]);

        $response->assertStatus(200);
    }

    public function test_can_delete_collaborator()
    {
        $response = $this->delete('/collaborators/1');

        $response->assertStatus(200);
    }

    public function test_can_deactivate_collaborator()
    {
        $response = $this->patch('/collaborators/1/deactivate');

        $response->assertStatus(200);
    }
}