<?php

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Src/Reposetories/QuizRepository.php';
require_once __DIR__ . '/../Src/Services/QuizService.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db = \Services\Connection::getConnection();

    $quizRepo = new \App\Repositories\QuizRepository($db);
    $quizService = new \Services\QuizService($quizRepo);

    $title = $_POST['title'];
    $description = $_POST['description'];

    $access_code = $quizService->generateAccessCode();
    $created_by = $_SESSION['user_id'];

    $lastId = $quizRepo->createQuiz($title, $description, $access_code, $created_by);

    if ($lastId) {
        header("Location: ../Src/Views/modifier_quiz.php?id=" . $lastId);
        exit();
    } else {
        echo "Erreur lors de la création du quiz.";
    }
}