<?php

require_once __DIR__ . "/Connection.php";

use Services\Connection;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pdo = Connection::getConnection();

    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role      = $_POST['role'];

    // check email
    $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$email]);

    if ($check->fetch()) {
        header("Location: ../Views/login.php?error=exists");
        exit();
    }

    // insert
    $stmt = $pdo->prepare("
        INSERT INTO users (firstname, lastname, email, password, label_role)
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([$firstname, $lastname, $email, $password, $role]);

    // redirect login
    header("Location: ../Views/login.php?registered=1");
    exit();
}