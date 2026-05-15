<?php
use Entities\Question;
use Services\Connection;
session_start();
require_once "../Entities/Question.php";
require_once "../Entities/Quiz.php";
include("../Services/Connection.php");
$connection = Connection::getConnection();
if (!isset($_SESSION["id_quiz"])) {
    header("Location: DashboardEtudiant.php");
    exit();
}

$quizManager = new \Entities\Quiz($_SESSION["id_quiz"], $connection);
$questions = $quizManager->getQuestionsAndAnswers();

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>EduQuiz - Évaluation</title>
</head>
<body class="bg-slate-50">

<header class="sticky top-0 z-50 bg-white border-b border-slate-200 px-6 py-4 shadow-sm">
    <div class="max-w-4xl mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold text-slate-800"><?php echo "".$_SESSION["id_quiz"] ?></h1>
        <div class="bg-rose-50 px-4 py-2 rounded-xl border border-rose-100">
            <p id="timer" class="text-lg font-mono font-black text-rose-600">14:59</p>
        </div>
    </div>
</header>

<main class="max-w-3xl mx-auto py-10 px-6">
   <form action="Resultat.php" method="POST" class="space-y-6">
            <?php foreach ($questions as $index => $q): ?>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-indigo-100">
                    <p class="text-sm font-bold text-indigo-500 mb-2">Question <?= $index + 1 ?></p>
                    <h3 class="text-xl font-bold text-gray-800 mb-4"><?= htmlspecialchars($q['question_text']) ?></h3>
                    
                    <div class="grid gap-3">
                        <?php foreach ($q['answers'] as $a): ?>
                            <label class="flex items-center p-4 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition-all">
                                <input type="radio" 
                                       name="question_<?= $q['id'] ?>" 
                                       value="<?= $a['id'] ?>" 
                                       class="w-5 h-5 text-indigo-600 focus:ring-indigo-500" required>
                                <span class="ml-3 font-medium text-gray-700"><?= htmlspecialchars($a['answer_text']) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-black text-lg shadow-lg hover:bg-indigo-700 transition-all active:scale-95">
                Terminer le Quiz
            </button>
        </form>
</main>

</body>
</html>