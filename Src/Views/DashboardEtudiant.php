<?php

use Repositories\AnswerRepository;
use Repositories\QuizAttemptRepository;
use Repositories\StudentAnswerRepository;
use Services\Connection;
use Services\ScoreService;
require_once '../../autoload.php';

$pdo = Connection::getConnection();
$answerRepository = new AnswerRepository($pdo);

$studentAnswerRepository = new StudentAnswerRepository($pdo);

$quizAttemptRepository = new QuizAttemptRepository($pdo);

$scoreService = new ScoreService(
        $answerRepository,
        $studentAnswerRepository,
        $quizAttemptRepository
);

$userId = 2;
$attempts = $scoreService
        ->getStudentAttempts($userId);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>EduQuiz - Dashboard Étudiant</title>
</head>
<body class="bg-slate-50 font-sans">

<div class="min-h-screen flex">
    <aside class="w-72 bg-white border-r border-slate-200 p-6 flex flex-col hidden md:flex">
        <div class="flex items-center gap-3 px-2 mb-10">
            <div class="w-8 h-8 bg-indigo-600 rounded-lg"></div>
            <span class="text-xl font-bold text-slate-800 uppercase tracking-tight">EduQuiz</span>
        </div>
        <nav class="flex-1 space-y-2">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-xl font-bold">
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition">
                Mes Certifications
            </a>
        </nav>
        <div class="pt-6 border-t border-slate-100">
            <button class="flex items-center gap-3 px-4 py-3 text-rose-500 font-bold w-full hover:bg-rose-50 rounded-xl transition text-sm">
                Déconnexion
            </button>
        </div>
    </aside>

    <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h2 class="text-3xl font-bold text-slate-800">Mon Espace Étudiant</h2>
                <p class="text-slate-500 mt-1">Prêt pour une nouvelle évaluation ?</p>
            </div>
            <div class="flex items-center gap-3 bg-white p-2 rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 font-bold">
                    JD
                </div>
                <div class="pr-4">
                    <p class="text-sm font-bold text-slate-800 text-sm">John Doe</p>
                    <p class="text-[10px] text-slate-400 uppercase font-black">Apprenant</p>
                </div>
            </div>
        </div>

        <div class="bg-indigo-600 rounded-[2.5rem] p-8 md:p-12 text-white mb-10 shadow-xl shadow-indigo-100 relative overflow-hidden">
            <div class="relative z-10 max-w-2xl">
                <h3 class="text-2xl font-bold mb-4">Accéder à un Quiz</h3>
                <p class="text-indigo-100 mb-8 font-medium">Entrez le code d'accès unique fourni par votre formateur pour commencer l'évaluation.</p>

                <form class="flex flex-col sm:flex-row gap-4">
                    <input type="text" maxlength="8" placeholder="Ex: PHP-2026"
                           class="flex-1 px-6 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder:text-indigo-200 outline-none focus:ring-4 focus:ring-white/20 transition-all font-mono font-bold text-lg uppercase">
                    <button class="bg-white text-indigo-600 px-10 py-4 rounded-2xl font-black hover:bg-indigo-50 transition-all shadow-lg active:scale-95">
                        Rejoindre
                    </button>
                </form>
            </div>
            <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                <h3 class="font-bold text-slate-800">Mes Résultats Précédents</h3>
                <span class="text-xs font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full italic italic tracking-tighter transition-all tracking-tighter transition-all">Score Moyen: 14.5/20</span>
            </div>
            <div class="overflow-x-auto italic italic">
                <table class="w-full text-left italic">
                    <thead class="bg-slate-50 text-slate-400 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Quiz</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Score Final</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php foreach ($attempts as $attempt): ?>
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4 font-bold text-slate-700">
                                <p class="font-bold text-slate-700"><?= $attempt['title'] ?></p>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500 italic italic"><?= $attempt['attempt_date'] ?></td>
                            <td class="px-6 py-4 italic tracking-tighter transition-all tracking-tighter transition-all">
                                <span class="text-lg font-black text-amber-500"><?= $attempt['score']?></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-black rounded-full uppercase italic tracking-tighter transition-all tracking-tighter transition-all"><?= $attempt['status'] ?></span>
                            </td>
                            <td class="px-6 py-4 italic tracking-tighter transition-all tracking-tighter transition-all">
                                <a href="index.php?action=corrections&attempt_id=<?= $attempt['id'] ?>"
                                   class="text-indigo-600 hover:underline font-bold text-sm">
                                    Détails
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>