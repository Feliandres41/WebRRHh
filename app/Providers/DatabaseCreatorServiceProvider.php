<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class DatabaseCreatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD') ?? '';
        $host = env('DB_HOST', '127.0.0.1');

        try {
            new \PDO("mysql:host=$host;dbname=$database", $username, $password);
        } catch (\PDOException $e) {
            $pdo = new \PDO("mysql:host=$host", $username, $password);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        }
    }
}