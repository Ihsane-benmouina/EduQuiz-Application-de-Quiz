<?php
session_start();

$_SESSION['user_id'] = 1;
$_SESSION['firstname'] = "Ihsane";

require_once __DIR__ . '/../../Config/Database.php';
require_once __DIR__ . '/../../Src/Reposetories/QuizRepository.php';

$db = \Services\Connection::getConnection();
$quizRepo = new App\Repositories\QuizRepository($db);

$myQuizzes = $quizRepo->getAllQuizzesByFormateur($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Formateur - EduQuiz</title>
</head>
<body class="bg-slate-50 min-h-screen flex">

<!-- SIDEBAR -->
<aside class="w-72 bg-white border-r border-slate-200 p-6 flex flex-col sticky top-0 h-screen">
    <div class="flex items-center gap-3 px-2 mb-10">
        <div class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
        <span class="text-xl font-black text-slate-800 uppercase tracking-tighter">EduQuiz</span>
    </div>

    <nav class="flex-1 space-y-2">
        <a href="#" class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-2xl font-bold transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            Tableau de bord
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-50 hover:text-slate-600 rounded-2xl font-medium transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Statistiques
        </a>
    </nav>

    <div class="pt-6 border-t border-slate-100">

        <button class="flex items-center gap-3 px-4 py-3 text-rose-500 font-bold w-full hover:bg-rose-50 rounded-2xl transition-all">
            Déconnexion
        </button>
    </div>
</aside>

<!-- MAIN CONTENT -->
<main class="flex-1 p-12 overflow-y-auto">
    <div class="flex justify-between items-center mb-12">
        <div>
            <h2 class="text-3xl font-black text-slate-800">Bonjour, <?= $_SESSION['firstname'] ?> 👋</h2>            <p class="text-slate-500 mt-1 font-medium">Prête à tester vos étudiants aujourd'hui ?</p>
        </div>

        <button onclick="toggleModal(true)"
                class="bg-indigo-600 text-white px-8 py-4 rounded-[1.5rem] font-bold shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition transform active:scale-95 flex items-center gap-3">
            <span class="text-2xl leading-none">+</span>
            Nouveau Quiz
        </button>
    </div>

    <!-- STATS CARDS (Optional but looks professional) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
            <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-1">Total Quiz</p>
            <h4 class="text-2xl font-black text-slate-800">12</h4>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
            <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-1">Participants</p>
            <h4 class="text-2xl font-black text-slate-800">458</h4>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
            <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-1">Moyenne</p>
            <h4 class="text-2xl font-black text-slate-800">14.5/20</h4>
        </div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-100 flex justify-between items-center">
            <h3 class="font-black text-slate-800 text-lg">Mes Quiz Récents</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 text-slate-400 text-[10px] uppercase font-black tracking-widest">
                <tr>
                    <th class="px-8 py-5">Titre du Quiz</th>
                    <th class="px-8 py-5">Code d'accès</th>
                    <th class="px-8 py-5">Statut</th>
                    <th class="px-8 py-5">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                <?php if (empty($myQuizzes)): ?>
                    <tr>
                        <td colspan="4" class="px-8 py-10 text-center text-slate-400 font-medium">
                            Aucun quiz créé pour le moment.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($myQuizzes as $quiz): ?>
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-8 py-6 font-bold text-slate-700">
                                <?= htmlspecialchars($quiz['title']) ?>
                            </td>
                            <td class="px-8 py-6">
                    <span class="bg-indigo-50 text-indigo-600 px-3 py-1 rounded-lg font-mono font-bold text-sm">
                        <?= htmlspecialchars($quiz['access_code']) ?>
                    </span>
                            </td>
                            <td class="px-8 py-6">
                    <span class="flex items-center gap-1.5 text-green-600 text-xs font-bold bg-green-50 px-3 py-1 rounded-full w-fit">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Actif
                    </span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex gap-4">
                                    <a href="modifier_quiz.php?id=<?= $quiz['id'] ?>"
                                       class="text-indigo-600 hover:text-indigo-800 font-black text-sm uppercase tracking-tighter">
                                        Gérer Questions
                                    </a>
                                    <a href="../../Public/delete_quiz_process.php?id=<?= $quiz['id'] ?>"   class="text-rose-400 hover:text-rose-600 font-bold text-sm">Supprimer</a>                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- MODAL: Création Simple (Titre + Description) -->
<div id="quizModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-lg rounded-[3rem] shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-200">

        <div class="p-8 border-b border-slate-50 flex justify-between items-center bg-white">
            <div>
                <h2 class="text-2xl font-black text-slate-800">Initialiser le Quiz</h2>
                <p class="text-slate-400 text-sm">Étape 1: Configuration de base</p>
            </div>
            <button onclick="toggleModal(false)" class="text-slate-400 hover:text-slate-600 p-2 bg-slate-50 rounded-full transition">✕</button>
        </div>
        <form action="../../Public/create_quiz_process.php" method="POST" class="p-8 space-y-6">
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Titre du Quiz</label>
                <input type="text" name="title" required placeholder="ex: MySQL: Jointures"
                       class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:border-indigo-600 outline-none transition font-bold text-slate-700">
            </div>

            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Description</label>
                <textarea name="description" rows="3" placeholder="Qu'est-ce que les étudiants vont apprendre ?"
                          class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:border-indigo-600 outline-none transition font-medium text-slate-700"></textarea>
            </div>

            <div class="bg-indigo-50/50 p-6 rounded-[2rem] border border-indigo-100 flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-black text-indigo-400 uppercase tracking-widest">Code Généré</p>
                    <span class="text-xl font-mono font-black text-indigo-700">#QUIZ-7734</span>
                </div>
                <button type="button" class="text-indigo-600 text-xs font-bold hover:underline">Regénérer</button>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-5 rounded-2xl font-black text-lg shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition transform active:scale-95">
                Créer et passer aux questions
            </button>

        </form>
    </div>
</div>

<script>
    function toggleModal(show) {
        const modal = document.getElementById('quizModal');
        modal.classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : 'auto';
    }
</script>

</body>
</html>