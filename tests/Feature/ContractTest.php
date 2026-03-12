<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ContractTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_list_contracts()
    {
        $response = $this->get('/contracts');

        $response->assertStatus(200);
    }

    public function test_can_show_contract_form()
    {
        $response = $this->get('/contracts/create');

        $response->assertStatus(200);
    }

    public function test_can_store_contract()
    {
        $data = [
            "tipo_contrato" => "Indefinido",
            "fecha_inicio" => "2024-01-01",
            "salario" => 2000000
        ];

        $response = $this->post('/contracts', $data);

        $response->assertStatus(201);
    }

    public function test_contract_validation_fails()
    {
        $response = $this->post('/contracts', []);

        $response->assertStatus(422);
    }

}