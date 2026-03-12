<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'RRHH User',
            'email' => 'rrhh@test.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('RRHH');
    }
}