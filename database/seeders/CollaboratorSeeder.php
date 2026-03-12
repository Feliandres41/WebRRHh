<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collaborator;

class CollaboratorSeeder extends Seeder
{
    public function run()
    {
        Collaborator::create([
            'name' => 'Juan Perez',
            'email' => 'juan@test.com',
            'phone' => '3001234567',
            'position' => 'Desarrollador',
            'status' => 1
        ]);

        Collaborator::create([
            'name' => 'Maria Lopez',
            'email' => 'maria@test.com',
            'phone' => '3007654321',
            'position' => 'Diseñadora',
            'status' => 1
        ]);
    }
}