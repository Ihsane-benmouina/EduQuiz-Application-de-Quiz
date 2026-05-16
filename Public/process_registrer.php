<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Src/Reposetories/UserRepository.php';
require_once __DIR__ . '/../Src/Services/UserService.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = \Services\Connection::getConnection();
    $repo = new \App\Repositories\UserRepository($db);
    $service = new \Services\UserService($repo);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $labelRole = $_POST['role']; // 'formateur' aw 'student'

    $result = $service->register($firstname, $lastname, $email, $password, $labelRole);

    if ($result === "success") {
        // Rediriger 3la login.php li kayna f `Src/Views/`
        header("Location: ../Src/Views/login.php?msg=registered");
        exit();
    } elseif ($result === "email_exists") {
        die("Erreur: Cet email est déjà utilisé !");
    } else {
        die("Erreur lors de l'inscription.");
    }
}