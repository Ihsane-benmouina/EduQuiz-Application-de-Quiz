<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!-- Main Container -->
<div class="min-h-screen bg-gray-100 flex flex-col">
    
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">QuizMaster - Étudiant</h1>
            <span>Bienvenue, <span class="font-semibold">
        </div>
    </nav>

    <div class="container mx-auto p-6 space-y-6">
        
        <!-- Section 1: Entrer Code Quiz -->
        <div class="bg-white p-8 rounded-xl shadow-md border-l-4 border-blue-500">
            <h2 class="text-lg font-bold mb-4 text-gray-700">Prêt pour une évaluation ?</h2>
            <form action="access_quiz.php" method="POST" class="flex gap-4">
                <input type="text" name="quiz_code" placeholder="Entrez le code du Quiz (ex: QUIZ123)" 
                       class="flex-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 uppercase">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    Commencer
                </button>
            </form>
        </div>

        <!-- Section 2: Statistiques Rapides -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                <p class="text-gray-500">Quiz Complétés</p>
                <p class="text-3xl font-bold text-blue-600">08</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                <p class="text-gray-500">Moyenne Générale</p>
                <p class="text-3xl font-bold text-green-500">16.5/20</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                <p class="text-gray-500">Classement</p>
                <p class="text-3xl font-bold text-orange-400">4ème</p>
            </div>
        </div>

        <!-- Section 3: Historique des Quiz -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-4 border-b bg-gray-50">
                <h3 class="font-bold text-gray-700">Mes Résultats Récents</h3>
            </div>
            <table class="w-full text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                    <tr>
                        <th class="p-4">Quiz</th>
                        <th class="p-4">Formateur</th>
                        <th class="p-4">Date</th>
                        <th class="p-4">Score</th>
                        <th class="p-4">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <tr class="hover:bg-gray-50">
                        <td class="p-4 font-medium">Algorithmique - Les Boucles</td>
                        <td class="p-4 text-gray-600 text-sm">Mme. Sara</td>
                        <td class="p-4 text-gray-500 text-sm">10 Mai 2026</td>
                        <td class="p-4"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-bold">18/20</span></td>
                        <td class="p-4"><a href="#" class="text-blue-600 hover:underline">Voir détails</a></td>
                    </tr>
                    <!-- B7al haka tqder t-dir foreach dyal PHP hna -->
                </tbody>
            </table>
        </div>

    </div>
</div>