<?php

namespace Services;

use PDO;
use PDOException;

class Connection
{
    private static $pdo = null;

    public static function getConnection()
    {
        if(self::$pdo === null){

            // 1. T-shih l-path: __DIR__ kat-3tik fin nta daba (Config)
            // Khass n-kharjo ghir mara wa7da bach nlqaw .env f l-root
            $envPath = __DIR__ . '/../.env';

            if (!file_exists($envPath)) {
                die("Erreur : Le fichier .env est introuvable dans : " . $envPath);
            }

            $env = parse_ini_file($envPath);

            // 2. T-qed mn l-asmiyat (DB_PASS vs DB_PASSWORD)
            $host = $env['DB_HOST'] ?? 'localhost';
            $dbname = $env['DB_NAME'] ?? '';
            $user = $env['DB_USER'] ?? 'root';
            $password = $env['DB_PASS'] ?? $env['DB_PASSWORD'] ?? ''; // kiy-9leb 3lihom bjoj

            try {
                self::$pdo = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $user,
                    $password
                );

                self::$pdo->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

            } catch(PDOException $e) {
                die("Connection failed : " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}