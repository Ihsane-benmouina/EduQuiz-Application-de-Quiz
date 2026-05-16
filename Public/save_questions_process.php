<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Src/Reposetories/QuizRepository.php';
require_once __DIR__ . '/../Src/Services/QuizService.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = \Services\Connection::getConnection();
    $repo = new \App\Repositories\QuizRepository($db);
    $service = new \Services\QuizService($repo);

    $quizId = $_POST['quiz_id'];
    $questions = $_POST['questions'] ?? [];

    if ($service->saveCompleteQuiz($quizId, $questions)) {
        header("Location: ../Src/Views/DashboardFormateur.php?success=1");
        exit();
    } else {
        die("Erreur de sauvegarde.");
    }
}