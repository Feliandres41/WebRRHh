<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CollaboratorTest extends TestCase
{
    use RefreshDatabase;
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
        $data = [
            "nombres" => "Juan",
            "apellidos" => "Perez",
            "tipo_documento" => "CC",
            "numero_documento" => "12345678",
            "fecha_nacimiento" => "1990-01-01"
        ];

        $response = $this->post('/collaborators', $data);

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
            "nombres" => "Juan actualizado"
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