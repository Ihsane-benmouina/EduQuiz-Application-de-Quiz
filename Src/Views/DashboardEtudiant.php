<?php
use Services\Connection;
use Entities\Student; 
use Entities\Question;
include("../Services/Connection.php");
require_once "../Entities/User.php";
require_once "../Entities/Student.php";
require_once "../Entities/Question.php";

$connection = Connection::getConnection();
session_start();



$student = new Student(
    $connection, 
    $_SESSION['userid'], 
    $_SESSION['firstname'], 
    $_SESSION['lastname'], 
    $_SESSION['email'], 
    ''
);



$historique = $student->getDetailsStudent();
 if (isset($_POST["check"])) {
    $acces_code = $_POST["quie_code"];
    $sql = "SELECT * FROM quizzes where access_code=? ";
    $stmt = $connection->prepare($sql);
     $stmt->execute([$acces_code]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        $_SESSION["id_quiz"]=$result["id"];

        header("location:PasserQuiz.php");
        exit();
    }else{
        echo" oerror";
    }

 }


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
            <span class="text-xl font-bold text-slate-800 uppercase tracking-tight"></span>
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
                    <p class="text-sm font-bold text-slate-800 text-sm"> <?php echo "".$_SESSION["firstname"] ?>
                </p>
                    <p class="text-[10px] text-slate-400 uppercase font-black">Apprenant</p>
                </div>
            </div>
        </div>

        <div class="bg-indigo-600 rounded-[2.5rem] p-8 md:p-12 text-white mb-10 shadow-xl shadow-indigo-100 relative overflow-hidden">
            <div class="relative z-10 max-w-2xl">
                <h3 class="text-2xl font-bold mb-4">Accéder à un Quiz</h3>
                <p class="text-indigo-100 mb-8 font-medium">Entrez le code d'accès unique fourni par votre formateur pour commencer l'évaluation.</p>

                <form action="" method="POST" class="flex  flex-col sm:flex-row gap-4">
                    <input type="text" name="quie_code" maxlength="8"  placeholder="Ex: PHP-2026"
                           class="flex-1 px-6 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder:text-indigo-200 outline-none focus:ring-4 focus:ring-white/20 transition-all font-mono font-bold text-lg uppercase">
                    <button name="check" class="bg-white text-indigo-600 px-10 py-4 rounded-2xl font-black hover:bg-indigo-50 transition-all shadow-lg active:scale-95">
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
    <?php if (empty($historique)): ?>
        <tr>
            <td colspan="5" class="px-6 py-10 text-center text-slate-400 italic">
                Vous n'avez passé aucun quiz pour le moment.
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($historique as $row): ?>
        <tr class="hover:bg-slate-50/50 transition">
            <td class="px-6 py-4">
                <p class="font-bold text-slate-700"><?php echo htmlspecialchars($row['title']); ?></p>
                <p class="text-xs text-slate-400 font-medium tracking-tighter transition-all">Formateur: --</p>
            </td>
            <td class="px-6 py-4 text-sm text-slate-500 italic">
                <?php echo date('d/m/Y', strtotime($row['attempt_date'])); ?>
            </td>
            <td class="px-6 py-4">
                <span class="text-lg font-black <?php echo $row['score'] >= 10 ? 'text-green-600' : 'text-rose-500'; ?>">
                    <?php echo $row['score']; ?>
                </span><span class="text-slate-400">/20</span>
            </td>
            <td class="px-6 py-4 text-sm tracking-tighter transition-all">
                <?php if ($row['status'] == 'completed'): ?>
                    <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase">Validé</span>
                <?php else: ?>
                    <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-black rounded-full uppercase italic">En cours</span>
                <?php endif; ?>
            </td>
            <td class="px-6 py-4">
                <button class="text-indigo-600 hover:underline font-bold text-sm">Détails</button>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>