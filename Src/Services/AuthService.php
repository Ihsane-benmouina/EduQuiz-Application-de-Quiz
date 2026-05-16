<?php

namespace Services;

use Services\Connection;
use PDO;

class AuthService
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getConnection();
    }

    public function register(array $data): bool
    {
        $firstname = trim($data['firstname']);
        $lastname  = trim($data['lastname']);
        $email     = strtolower(trim($data['email']));
        $password  = password_hash($data['password'], PASSWORD_DEFAULT);
        $role      = $data['role'];

        // check email
        $check = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->fetch()) {
            return false;
        }

        // insert user
        $stmt = $this->pdo->prepare("
            INSERT INTO users (firstname, lastname, email, password, label_role)
            VALUES (?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $firstname,
            $lastname,
            $email,
            $password,
            $role
        ]);
    }

    public function login(string $email, string $password): bool
    {
        $email = strtolower(trim($email));

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            session_start();

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['firstname'];
            $_SESSION['role'] = $user['label_role'];

            return true;
        }

        return false;
    }

    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
    }
}