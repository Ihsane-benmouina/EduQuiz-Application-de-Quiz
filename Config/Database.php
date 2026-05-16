<?php

namespace Services;

use PDO;
use PDOException;

class Connection
{
    private static $pdo = null;

    public static function getConnection()
    {
        if (self::$pdo === null) {

$env = parse_ini_file('../../.env');
if (!$env) {
    die("❌ .env file not found at: " . __DIR__ . "/../../.env");
}

            $host = $env['DB_HOST'];
            $dbname = $env['DB_NAME'];
            $user = $env['DB_USER'];
            $password = $env['DB_PASSWORD'];

            try {
                self::$pdo = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $user,
                    $password
                );

                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}