<?php
require_once __DIR__ . '/../../autoload.php';
use Services\Connection;
$connection = Connection::getConnection();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Détails du Quiz - EduQuiz</title>
</head>
<body class="bg-slate-50 font-sans">

<header class="bg-white border-b border-slate-200 px-6 py-5 sticky top-0 z-50">
    <div class="max-w-4xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-4">
            <a href="student_dashboard.php" class="p-2 hover:bg-slate-100 rounded-full transition">
                <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <div>
                <h1 class="text-xl font-bold text-slate-800">Correction : Fondamentaux du HTML</h1>
                <p class="text-xs text-slate-400 font-bold uppercase">Score Final : 18/20</p>
            </div>
        </div>
        <span class="bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest">Validé</span>
    </div>
</header>

<main class="max-w-3xl mx-auto py-10 px-6 space-y-8">

    <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 bg-green-500 text-white px-6 py-1 rounded-bl-2xl text-[10px] font-black uppercase">Correct</div>
        <div class="flex items-start gap-4 mb-6">
            <span class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center font-bold flex-shrink-0">01</span>
            <h3 class="text-lg font-bold text-slate-800 leading-tight pt-1">Que signifie l'élément &lt;br&gt; en HTML ?</h3>
        </div>

        <div class="space-y-3">
            <div class="flex items-center p-4 border-2 border-green-500 bg-green-50/50 rounded-2xl relative">
                <div class="w-5 h-5 rounded-full border-4 border-green-500 bg-white mr-4"></div>
                <span class="font-bold text-green-800">Un saut de ligne</span>
                <svg class="w-5 h-5 text-green-500 ml-auto" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="flex items-center p-4 border-2 border-slate-50 rounded-2xl opacity-50">
                <div class="w-5 h-5 rounded-full border-2 border-slate-200 mr-4"></div>
                <span class="text-slate-500 font-medium">Un paragraphe</span>
            </div>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 bg-rose-500 text-white px-6 py-1 rounded-bl-2xl text-[10px] font-black uppercase">Erreur</div>
        <div class="flex items-start gap-4 mb-6">
            <span class="w-8 h-8 bg-rose-100 text-rose-600 rounded-lg flex items-center justify-center font-bold flex-shrink-0">02</span>
            <h3 class="text-lg font-bold text-slate-800 leading-tight pt-1">Quelle balise définit le titre le plus important ?</h3>
        </div>

        <div class="space-y-3">
            <div class="flex items-center p-4 border-2 border-rose-500 bg-rose-50/50 rounded-2xl">
                <div class="w-5 h-5 rounded-full border-4 border-rose-500 bg-white mr-4"></div>
                <span class="font-bold text-rose-800">&lt;h6&gt;</span>
                <svg class="w-5 h-5 text-rose-500 ml-auto" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
            </div>

            <div class="flex items-center p-4 border-2 border-dashed border-green-500 bg-green-50/30 rounded-2xl">
                <div class="w-5 h-5 rounded-full border-2 border-green-500 mr-4"></div>
                <span class="font-bold text-green-700">&lt;h1&gt; (La bonne réponse)</span>
            </div>
        </div>

        <div class="mt-6 p-4 bg-slate-50 rounded-2xl border-l-4 border-indigo-500">
            <p class="text-xs text-slate-500 leading-relaxed font-medium">
                <strong class="text-indigo-600 uppercase tracking-tighter">Note pédagogique :</strong>
                En HTML, les balises de titre vont de h1 à h6, h1 étant le niveau d'importance le plus élevé.
            </p>
        </div>
    </div>

    <div class="flex justify-center pt-6">
        <a href="student_dashboard.php" class="px-10 py-4 bg-slate-900 text-white rounded-2xl font-black shadow-xl shadow-slate-200 hover:bg-indigo-600 transition transform active:scale-95">
            Revenir au Dashboard
        </a>
    </div>
</main>

</body>
</html>