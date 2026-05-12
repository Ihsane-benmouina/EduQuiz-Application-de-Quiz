<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>EduQuiz - Login</title>
</head>
<body class="bg-slate-50">
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-4xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/2 bg-indigo-600 p-12 text-white flex flex-col justify-center">
            <h1 class="text-4xl font-extrabold mb-4">EduQuiz</h1>
            <p class="text-indigo-100 text-lg leading-relaxed">Simplifiez vos évaluations modules après modules.</p>
        </div>
        <div class="md:w-1/2 p-12">
            <h2 class="text-2xl font-bold text-slate-800 mb-6">Connexion</h2>
            <form action="dashboard.php" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                    <input type="email" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-indigo-500" placeholder="nom@ecole.com">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Mot de passe</label>
                    <input type="password" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-indigo-500" placeholder="••••••••">
                </div>
                <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 rounded-xl shadow-lg transition-all">Se Connecter</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>