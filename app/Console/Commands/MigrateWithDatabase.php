<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class MigrateWithDatabase extends Command
{
    protected $signature = 'migrate:db';
    protected $description = 'Crea la base de datos si no existe y corre las migraciones';

    public function handle()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD') ?? '';

        $this->info("Verificando base de datos: $database");

        // Conectarse a MySQL sin base de datos
        $pdo = new \PDO("mysql:host=127.0.0.1", $username, $password);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        $this->info("Base de datos '$database' creada o ya existía");

        // Ejecutar migraciones
        $this->call('migrate', [
            '--force' => true
        ]);

        $this->info("Migraciones completadas");
    }
}