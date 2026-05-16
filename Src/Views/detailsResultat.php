<?php
require_once __DIR__ . '/../../autoload.php';

use Services\Connection;
use Services\ScoreService;
use Repositories\AnswerRepository;
use Repositories\StudentAnswerRepository;
use Repositories\QuizAttemptRepository;

$pdo = Connection::getConnection();

$answerRepo = new AnswerRepository($pdo);
$studentAnswerRepo = new StudentAnswerRepository($pdo);
$quizAttemptRepo = new QuizAttemptRepository($pdo);

$scoreService = new ScoreService(
        $answerRepo,
        $studentAnswerRepo,
        $quizAttemptRepo
);

$attemptId = 1;

if (!$attemptId) {
    die("Attempt ID missing");
}

$corrections = $scoreService->getCorrections($attemptId);
$attemptDetails = $quizAttemptRepo->getAttemptDetails($attemptId);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 font-sans">

<header class="bg-white border-b px-6 py-5">
    <div class="max-w-4xl mx-auto flex justify-between items-center">

        <div>
            <h1 class="text-xl font-bold">
                Correction : <?= htmlspecialchars($attemptDetails['title']) ?>
            </h1>
            <p class="text-sm text-gray-500">
                Score : <?= $attemptDetails['score'] ?>/20
            </p>
        </div>

        <?php $passed = $attemptDetails['score'] >= 12; ?>

        <span class="<?= $passed ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>
            px-4 py-1 rounded-full text-sm font-bold">
            <?= $passed ? 'Validé' : 'Échec' ?>
        </span>

    </div>
</header>

<main class="max-w-3xl mx-auto py-10 space-y-6">

    <?php foreach ($corrections as $index => $question): ?>

        <div class="bg-white p-6 rounded-2xl shadow relative">

            <!-- Question -->
            <h3 class="font-bold mb-4">
                <?= ($index + 1) . '. ' . htmlspecialchars($question['question_text']) ?>
            </h3>

            <div class="space-y-3">

                <?php foreach ($question['answers'] as $answer): ?>

                    <?php
                    $isCorrect = $answer['is_correct'];
                    $isSelected = $answer['is_selected'];

                    // STYLE LOGIC
                    if ($isCorrect) {
                        $style = "border-green-500 bg-green-50 text-green-800";
                    } elseif ($isSelected && !$isCorrect) {
                        $style = "border-red-500 bg-red-50 text-red-800";
                    } else {
                        $style = "border-slate-200 bg-white text-slate-500";
                    }
                    ?>

                    <div class="p-4 rounded-xl border-2 <?= $style ?> flex justify-between items-center">

            <span class="font-medium">
                <?= htmlspecialchars($answer['answer_text']) ?>
            </span>

                        <!-- Icons -->
                        <?php if ($isCorrect): ?>
                            <span class="text-green-600 font-bold">✔</span>
                        <?php elseif ($isSelected): ?>
                            <span class="text-red-600 font-bold">✘</span>
                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    <?php endforeach; ?>

    <div class="text-center mt-10">
        <a href="student_dashboard.php"
           class="bg-black text-white px-6 py-3 rounded-xl font-bold">
            Retour
        </a>
    </div>

</main>

</body>
</html>