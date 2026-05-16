<?php

require_once __DIR__ . "/AuthService.php";

use Services\AuthService;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $auth = new AuthService();

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($auth->login($email, $password)) {

        // 🔥 check role from session
        if ($_SESSION['role'] === 'student') {

            header("Location: ../Views/DashboardEtudiant.php");
            exit();

        } elseif ($_SESSION['role'] === 'prof') {

            header("Location: ../Views/DashboardFormateur.php");
            exit();

        } else {

            header("Location: ../Views/login.php?error=role");
            exit();
        }

    } else {

        header("Location: ../Views/login.php?error=1");
        exit();
    }
}