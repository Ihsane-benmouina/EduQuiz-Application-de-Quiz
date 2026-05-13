<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription Formateur - EduQuiz</title>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

<div class="max-w-md w-full bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200 border border-slate-100">
    <!-- Header Form -->
    <div class="text-center mb-10">
        <!-- Icone Indigo bach tji m3a l'app -->
        <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Espace Formateur</h2>
        <p class="text-slate-500 text-sm font-medium mt-1">Créez vos quiz et suivez vos groupes</p>
    </div>

    <form action="process_register.php" method="POST" class="space-y-5">
        <input type="hidden" name="role" value="formateur">

        <div>
            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 ml-1">Identité Professionnelle</label>
            <div class="space-y-3">
                <input type="text" name="name" required placeholder="Nom complet (ex: Pr. Alami)"
                       class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none transition-all font-medium placeholder:text-slate-300">

                <input type="text" name="specialty" required placeholder="Spécialité (ex: Algorithmique)"
                       class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none transition-all font-medium placeholder:text-slate-300">
            </div>
        </div>

        <div>
            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 ml-1">Accès Sécurisé</label>
            <div class="space-y-3">
                <input type="email" name="email" required placeholder="Email professionnel"
                       class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none transition-all font-medium placeholder:text-slate-300">

                <input type="password" name="password" required placeholder="Mot de passe"
                       class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none transition-all font-medium placeholder:text-slate-300">
            </div>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-4 mt-4 rounded-2xl font-black text-lg shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition transform active:scale-95">
            Ouvrir mon accès
        </button>
    </form>

    <p class="mt-8 text-center text-slate-400 text-xs font-bold uppercase tracking-tighter">
        Déjà inscrit ? <a href="login.php" class="text-indigo-600 hover:underline">Se connecter</a>
    </p>
</div>

</body>
</html>