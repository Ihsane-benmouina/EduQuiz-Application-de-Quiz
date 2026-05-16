index.php


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bienvenue sur EduQuiz</title>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6 relative">

<!-- Bouton Login  -->
<div class="absolute top-8 right-8">
    <a href="login.php" class="flex items-center gap-2 px-6 py-3 bg-white border border-slate-200 rounded-2xl text-slate-600 font-bold hover:bg-slate-50 hover:border-indigo-600 hover:text-indigo-600 transition-all shadow-sm active:scale-95">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
        </svg>
        Se connecter
    </a>
</div>

<div class="max-w-4xl w-full text-center">
    <!--  Titre -->
    <div class="mb-12">
        <div class="w-16 h-16 bg-indigo-600 rounded-2xl mx-auto mb-4 shadow-lg shadow-indigo-200"></div>
        <h1 class="text-4xl font-black text-slate-800 tracking-tight">Bienvenue sur <span class="text-indigo-600">EduQuiz</span></h1>
        <p class="text-slate-500 mt-2 font-medium">Choisissez votre profil pour commencer</p>
    </div>

    <!-- Grille des Choix -->
    <div class="grid md:grid-cols-2 gap-8">
        <!--Étudiant -->
        <a href="../Src/Views/register_student.php" class="group bg-white p-10 rounded-[3rem] border-2 border-transparent hover:border-indigo-600 shadow-xl shadow-slate-200/50 transition-all duration-300 transform hover:-translate-y-2">
            <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800 mb-3">Je suis Étudiant</h2>
            <p class="text-slate-500 text-sm leading-relaxed">Je souhaite passer des évaluations et consulter mes résultats.</p>
            <div class="mt-8 inline-flex items-center text-indigo-600 font-bold">
                S'inscrire <span class="ml-2 group-hover:translate-x-2 transition-transform">→</span>
            </div>
        </a>

        <!-- Professeur -->
        <a href="../Src/Views/register_formateur.php" class="group bg-white p-10 rounded-[3rem] border-2 border-transparent hover:border-slate-800 shadow-xl shadow-slate-200/50 transition-all duration-300 transform hover:-translate-y-2">
            <div class="w-20 h-20 bg-slate-50 text-slate-800 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-slate-800 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800 mb-3">Je suis Formateur</h2>
            <p class="text-slate-500 text-sm leading-relaxed">Je souhaite créer des quiz et gérer les performances de mes groupes.</p>
            <div class="mt-8 inline-flex items-center text-slate-800 font-bold">
                S'inscrire <span class="ml-2 group-hover:translate-x-2 transition-transform">→</span>
            </div>
        </a>
    </div>

    <p class="mt-12 text-slate-400 text-sm font-medium italic">Plateforme sécurisée pour l'apprentissage hybride</p>
</div>

</body>
</html>














<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bienvenue sur EduQuiz</title>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6 relative">

<div class="absolute top-8 right-8">
    <a href="Src/Views/login.php" class="flex items-center gap-2 px-6 py-3 bg-white border border-slate-200 rounded-2xl text-slate-600 font-bold hover:bg-slate-50 hover:border-indigo-600 hover:text-indigo-600 transition-all shadow-sm active:scale-95">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
        </svg>
        Se connecter
    </a>
</div>

<div class="max-w-4xl w-full text-center">
    <div class="mb-12">
        <div class="w-16 h-16 bg-indigo-600 rounded-2xl mx-auto mb-4 shadow-lg shadow-indigo-200"></div>
        <h1 class="text-4xl font-black text-slate-800 tracking-tight">Bienvenue sur <span class="text-indigo-600">EduQuiz</span></h1>
        <p class="text-slate-500 mt-2 font-medium">Choisissez votre profil pour commencer</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <a href="Src/Views/register_student.php" class="group bg-white p-10 rounded-[3rem] border-2 border-transparent hover:border-indigo-600 shadow-xl shadow-slate-200/50 transition-all duration-300 transform hover:-translate-y-2">
            <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800 mb-3">Je suis Étudiant</h2>
            <p class="text-slate-500 text-sm leading-relaxed">Je souhaite passer des évaluations et consulter mes résultats.</p>
            <div class="mt-8 inline-flex items-center text-indigo-600 font-bold">
                S'inscrire <span class="ml-2 group-hover:translate-x-2 transition-transform">→</span>
            </div>
        </a>

        <a href="Src/Views/register_formateur.php" class="group bg-white p-10 rounded-[3rem] border-2 border-transparent hover:border-slate-800 shadow-xl shadow-slate-200/50 transition-all duration-300 transform hover:-translate-y-2">
            <div class="w-20 h-20 bg-slate-50 text-slate-800 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-slate-800 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800 mb-3">Je suis Formateur</h2>
            <p class="text-slate-500 text-sm leading-relaxed">Je souhaite créer des quiz et gérer les performances de mes groupes.</p>
            <div class="mt-8 inline-flex items-center text-slate-800 font-bold">
                S'inscrire <span class="ml-2 group-hover:translate-x-2 transition-transform">→</span>
            </div>
        </a>
    </div>

    <p class="mt-12 text-slate-400 text-sm font-medium italic">Plateforme sécurisée pour l'apprentissage hybride</p>
</div>

</body>
</html>










