<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Src/Reposetories/UserRepository.php';
require_once __DIR__ . '/../Src/Services/UserService.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = \Services\Connection::getConnection();
    $repo = new \App\Repositories\UserRepository($db);
    $service = new \Services\UserService($repo);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $service->login($email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_firstname'] = $user['firstname'];
        $_SESSION['user_lastname'] = $user['lastname'];
        $_SESSION['user_role'] = $user['label_role']; // 'formateur' aw 'student'

        // Redirection relative s7i7a mn folder Public/ l-folder Src/Views/
        if ($user['label_role'] === 'formateur') {
            header("Location: ../Src/Views/DashboardFormateur.php");
        } else {
            header("Location: ../Src/Views/DashboardEtudiant.php");
        }
        exit();
    } else {
        header("Location: ../Src/Views/login.php?error=bad_credentials");
        exit();
    }
}