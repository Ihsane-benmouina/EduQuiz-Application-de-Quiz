<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Src/Reposetories/QuizRepository.php';

if (isset($_GET['question_id']) && isset($_GET['quiz_id'])) {
    $db = \Services\Connection::getConnection();
    $repo = new \App\Repositories\QuizRepository($db);

    $questionId = $_GET['question_id'];
    $quizId = $_GET['quiz_id'];

    $repo->deleteAnswersByQuestion($questionId);

    $repo->deleteQuestionById($questionId);

    header("Location: ../Src/Views/modifier_quiz.php?id=" . $quizId);
    exit();
}