<!DOCTYPE html>
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
        <h1 class="text-xl font-bold text-slate-800">Quiz: PHP & MySQL</h1>
        <div class="bg-rose-50 px-4 py-2 rounded-xl border border-rose-100">
            <p id="timer" class="text-lg font-mono font-black text-rose-600">14:59</p>
        </div>
    </div>
</header>

<main class="max-w-3xl mx-auto py-10 px-6">
    <form action="resultat.php" method="POST" class="space-y-6">

        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
            <p class="text-indigo-600 font-black mb-2 uppercase text-xs tracking-widest">Question 01</p>
            <h3 class="text-xl font-bold text-slate-800 mb-6">Que signifie PHP ?</h3>
            <div class="space-y-3">
                <label class="flex items-center p-4 border-2 border-slate-50 rounded-2xl cursor-pointer hover:bg-indigo-50 transition">
                    <input type="radio" name="q1" value="1" class="w-5 h-5 text-indigo-600">
                    <span class="ml-4 font-bold text-slate-600">Personal Home Page</span>
                </label>
                <label class="flex items-center p-4 border-2 border-slate-50 rounded-2xl cursor-pointer hover:bg-indigo-50 transition">
                    <input type="radio" name="q1" value="2" class="w-5 h-5 text-indigo-600">
                    <span class="ml-4 font-bold text-slate-600">PHP: Hypertext Preprocessor</span>
                </label>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
            <p class="text-indigo-600 font-black mb-2 uppercase text-xs tracking-widest">Question 02</p>
            <h3 class="text-xl font-bold text-slate-800 mb-6">Quelle balise est correcte ?</h3>
            <div class="space-y-3">
                <label class="flex items-center p-4 border-2 border-slate-50 rounded-2xl cursor-pointer hover:bg-indigo-50 transition">
                    <input type="radio" name="q2" value="1" class="w-5 h-5 text-indigo-600">
                    <span class="ml-4 font-bold text-slate-600">&lt;?php ... ?&gt;</span>
                </label>
                <label class="flex items-center p-4 border-2 border-slate-50 rounded-2xl cursor-pointer hover:bg-indigo-50 transition">
                    <input type="radio" name="q2" value="2" class="w-5 h-5 text-indigo-600">
                    <span class="ml-4 font-bold text-slate-600">&lt;script&gt; ... &lt;/script&gt;</span>
                </label>
            </div>
        </div>

        <div class="pt-10">
            <button type="submit" class="w-full bg-indigo-600 text-white py-5 rounded-3xl font-black text-xl shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition transform active:scale-95">
                Soumettre mes réponses
            </button>
        </div>
    </form>
</main>

</body>
</html>