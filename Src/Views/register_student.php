<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription Étudiant - EduQuiz</title>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

<div class="max-w-md w-full bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200 border border-slate-100">
    <!-- Header Form -->
    <div class="text-center mb-10">
        <div class="w-12 h-12 bg-indigo-600 rounded-xl mx-auto mb-4 flex items-center justify-center text-white font-bold text-xl">S</div>
        <h2 class="text-2xl font-black text-slate-800">Espace Étudiant</h2>
        <p class="text-slate-400 text-sm font-medium">Créez votre compte pour commencer</p>
    </div>

    <form action="process_register.php" method="POST" class="space-y-5">
        <input type="hidden" name="role" value="student">

        <div>
            <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-2 ml-1">Nom Complet</label>
            <input type="text" name="name" required placeholder="Ex: Ahmed Benani"
                   class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none transition-all font-medium">
        </div>

        <div>
            <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-2 ml-1">Email Professionnel</label>
            <input type="email" name="email" required placeholder="ahmed@ecole.com"
                   class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none transition-all font-medium">
        </div>

        <div>
            <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-2 ml-1">Mot de passe</label>
            <input type="password" name="password" required placeholder="••••••••"
                   class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none transition-all font-medium">
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-black text-lg shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition transform active:scale-95">
            Créer mon compte
        </button>
    </form>

    <p class="mt-8 text-center text-slate-400 text-xs font-bold uppercase tracking-tighter">
        Déjà inscrit ? <a href="login.php" class="text-indigo-600 hover:underline">Se connecter</a>
    </p>
</div>

</body>
</html>