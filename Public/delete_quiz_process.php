<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Src/Reposetories/QuizRepository.php';

if (isset($_GET['id'])) {
    $db = \Services\Connection::getConnection();
    $repo = new \App\Repositories\QuizRepository($db);
    $quizId = $_GET['id'];

    $repo->deleteQuestionsByQuiz($quizId);

    // 2. Msa7 l-quiz
    if ($repo->deleteQuiz($quizId)) {
        header("Location: ../Src/Views/DashboardFormateur.php?msg=deleted");
        exit();
    } else {
        echo "Erreur lors de la suppression.";
    }
}