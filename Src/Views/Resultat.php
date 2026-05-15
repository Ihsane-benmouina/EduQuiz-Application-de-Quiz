<?php
session_start();
require_once "../Entities/QuizAttempt.php";
require_once "../Services/Connection.php";

$connection = \Services\Connection::getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Jib l-IDs mn l-session
    $userId = $_SESSION['userid']; 
    $quizId = $_SESSION['id_quiz'];

    // 2. Défini l-valeurs b NULL kif bghiti
    $finalScore = null; 
    $status = 'completed'; // awla null ila kant l-base de données kat-qbelha

    // 3. Sift l-data
    $attemptManager = new \Entities\Quiz_attempt($connection);
    $isSaved = $attemptManager->saveAttempt($userId, $quizId, $finalScore, $status);

    if ($isSaved) {
        // Affichi l-page dyal "Fin" 3adi
    }
}
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>EduQuiz - Résultat</title>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

<div class="max-w-md w-full bg-white rounded-[3rem] p-10 text-center shadow-2xl border-4 border-white">
    <div class="w-24 h-24 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>

    <h2 class="text-3xl font-black text-slate-800 mb-2 italic">Félicitations !</h2>
    <p class="text-slate-500 font-medium mb-8">Votre évaluation est terminée. Voici votre score final :</p>

    <div class="bg-indigo-50 rounded-[2rem] p-8 mb-8 border border-indigo-100">
        <p class="text-[10px] text-indigo-400 font-black uppercase tracking-widest mb-2">Score Obtenu</p>
        <div class="text-6xl font-black text-indigo-600 italic">16<span class="text-indigo-300 text-3xl">/20</span></div>
    </div>

    <div class="space-y-4">
        <a href="student_dashboard.php" class="block w-full bg-slate-900 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-slate-800 transition transform active:scale-95">
            Retour au Dashboard
        </a>
        <p class="text-xs text-slate-400 font-bold italic uppercase tracking-tighter">Votre note a été enregistrée par le formateur</p>
    </div>
</div>

</body>
</html>