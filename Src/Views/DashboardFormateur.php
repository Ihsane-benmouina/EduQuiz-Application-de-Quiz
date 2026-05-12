<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="min-h-screen bg-slate-50 flex">
    <div class="w-72 bg-white border-r border-slate-200 p-6 flex flex-col">
        <div class="flex items-center gap-3 px-2 mb-10">
            <div class="w-8 h-8 bg-indigo-600 rounded-lg"></div>
            <span class="text-xl font-bold text-slate-800 uppercase tracking-tight">EduQuiz</span>
        </div>
        <nav class="flex-1 space-y-1">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-xl font-bold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Mes Quiz
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                Statistiques
            </a>
        </nav>
        <div class="pt-6 border-t border-slate-100">
            <button class="flex items-center gap-3 px-4 py-3 text-rose-500 font-bold w-full hover:bg-rose-50 rounded-xl transition-all text-sm">
                Déconnexion
            </button>
        </div>
    </div>

    <main class="flex-1 p-10 overflow-y-auto">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h2 class="text-3xl font-bold text-slate-800">Bonjour, Mme Ihsane 👋</h2>
                <p class="text-slate-500 mt-1">Voici le résumé de vos activités pédagogiques.</p>
            </div>
            <button onclick="toggleModal(true)" class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all flex items-center gap-2">
                <span class="text-xl">+</span> Créer un Quiz
            </button>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm">
            <div class="p-6 border-b border-slate-100">
                <h3 class="font-bold text-slate-800">Quiz Récents</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-400 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Titre du Quiz</th>
                        <th class="px-6 py-4">Code d'accès</th>
                        <th class="px-6 py-4">Participants</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-6 py-4 font-semibold text-slate-700">Quiz PHP: Les Bases</td>
                        <td class="px-6 py-4"><span class="bg-slate-100 px-3 py-1 rounded-lg font-mono text-sm">#PHP24</span></td>
                        <td class="px-6 py-4 text-slate-500 text-sm">24 Étudiants</td>
                        <td class="px-6 py-4 flex gap-3">
                            <button class="text-indigo-600 hover:text-indigo-800 font-bold text-sm">Modifier</button>
                            <button class="text-rose-600 hover:text-rose-800 font-bold text-sm">Supprimer</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<div id="quizModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-4xl max-h-[90vh] rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col">

        <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-white sticky top-0">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Configuration du Quiz</h2>
                <p class="text-sm text-slate-500">Remplissez les détails pour générer votre code d'accès.</p>
            </div>
            <button onclick="toggleModal(false)" class="text-slate-400 hover:text-slate-600 p-2 bg-slate-50 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="p-8 overflow-y-auto space-y-10">
            <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <h3 class="text-sm font-black uppercase tracking-widest text-indigo-600">1. Informations Générales</h3>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Titre du Module</label>
                        <input type="text" placeholder="ex: Programmation Orientée Objet" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                        <textarea rows="3" placeholder="Brève description pour les étudiants..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition"></textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-sm font-black uppercase tracking-widest text-indigo-600">2. Paramètres Avancés</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Temps (min)</label>
                            <input type="number" value="30" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Tentatives max</label>
                            <input type="number" value="1" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Code d'accès (Généré)</label>
                        <div class="flex gap-2">
                            <input type="text" readonly value="QUIZ-7842" class="flex-1 px-4 py-3 bg-indigo-50 border border-indigo-100 text-indigo-700 font-mono font-bold rounded-xl outline-none">
                            <button class="bg-slate-800 text-white px-4 rounded-xl hover:bg-slate-900 transition">Regénérer</button>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="border-slate-100">

            <section class="space-y-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-sm font-black uppercase tracking-widest text-indigo-600">3. Questions & Réponses</h3>
                    <button class="text-sm font-bold text-indigo-600 hover:bg-indigo-50 px-4 py-2 rounded-lg transition">+ Ajouter une question</button>
                </div>

                <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 relative group">
                    <button class="absolute top-4 right-4 text-rose-400 opacity-0 group-hover:opacity-100 transition">Supprimer</button>
                    <div class="space-y-4">
                        <input type="text" placeholder="Posez votre question ici..." class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl font-bold focus:ring-2 focus:ring-indigo-400 outline-none transition">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex items-center gap-3 bg-white p-2 rounded-xl border border-slate-100 shadow-sm">
                                <input type="radio" name="correct_1" class="w-5 h-5 text-green-500 focus:ring-green-400">
                                <input type="text" placeholder="Option 1" class="flex-1 bg-transparent outline-none text-sm">
                            </div>
                            <div class="flex items-center gap-3 bg-white p-2 rounded-xl border border-slate-100 shadow-sm">
                                <input type="radio" name="correct_1" class="w-5 h-5 text-green-500 focus:ring-green-400">
                                <input type="text" placeholder="Option 2" class="flex-1 bg-transparent outline-none text-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="p-8 border-t border-slate-100 bg-slate-50/50 flex justify-end gap-4">
            <button onclick="toggleModal(false)" class="px-8 py-3 text-slate-500 font-bold hover:text-slate-700 transition">Annuler</button>
            <button class="px-10 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all">Enregistrer le Quiz</button>
        </div>
    </div>
</div>

<script>
    function toggleModal(show) {
        const modal = document.getElementById('quizModal');
        if (show) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Kat-habess l'scroll dyal l'page
        } else {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Kat-rje3 l'scroll
        }
    }

    // Bach ila cliquiti f'l'khwa (outside) t'sedd bo7dha
    window.onclick = function(event) {
        const modal = document.getElementById('quizModal');
        if (event.target == modal) {
            toggleModal(false);
        }
    }
</script>

</body>
</html>