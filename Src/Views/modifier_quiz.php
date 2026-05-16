<?php
require_once __DIR__ . '/../../Config/Database.php';
require_once __DIR__ . '/../Reposetories/QuizRepository.php';
$db = \Services\Connection::getConnection();
$repo = new App\Repositories\QuizRepository($db);
$quizId = $_GET['id'];

$rawData = $repo->getQuizFullDetails($quizId);

$formatted = [];
foreach ($rawData as $row) {
    $formatted[$row['q_id']]['id'] = $row['q_id'];
    $formatted[$row['q_id']]['text'] = $row['question_text'];    $formatted[$row['q_id']]['options'][] = [
            'text' => $row['answer_text'],
            'is_correct' => $row['is_correct']
    ];
}
?>

<script>
    const existingQuestions = <?= json_encode(array_values($formatted)) ?>;
</script>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gérer les Questions - EduQuiz</title>
</head>
<body class="bg-slate-50 min-h-screen p-8">

<div class="max-w-4xl mx-auto">
    <!-- Header Page -->
    <div class="flex justify-between items-center mb-10">
        <a href="DashboardFormateur.php" class="text-slate-500 font-bold hover:text-indigo-600 transition">← Retour au Dashboard</a>
        <div class="text-right">
            <h1 class="text-3xl font-black text-slate-800">Quiz PHP: Les Bases</h1>
            <p class="text-slate-500">Gérez vos questions et réponses</p>
        </div>
    </div>

    <!-- FORMULAIRE DES QUESTIONS -->
    <form action="../../Public/save_questions_process.php" method="POST">        <input type="hidden" name="quiz_id" value="<?= $quizId ?>">

        <div id="questions-container" class="space-y-8">
            <!-- Les questions ghadi itzadou hna b'JavaScript -->
        </div>

        <!-- Bouton Ajouter (Design nqi) -->
        <button type="button" id="add-question-btn"
                class="w-full mt-8 py-6 border-2 border-dashed border-slate-200 rounded-[2.5rem] text-slate-400 font-bold hover:border-indigo-400 hover:text-indigo-600 transition-all bg-white shadow-sm">
            + Ajouter une question au quiz
        </button>

        <!-- Footer Fixe pour Sauvegarder -->
        <div class="sticky bottom-8 mt-12 bg-white/80 backdrop-blur-md p-6 rounded-[2rem] border border-slate-200 shadow-xl flex justify-between items-center">
            <p class="text-sm text-slate-500 font-medium">N'oubliez pas d'enregistrer vos modifications.</p>
            <button type="submit" class="bg-indigo-600 text-white px-10 py-4 rounded-2xl font-black shadow-lg hover:bg-indigo-700 transition transform active:scale-95">
                Enregistrer le Quiz
            </button>
        </div>
    </form>
</div>

<script>
    let questionIndex = 0;

    function createQuestionBlock(index, data = null) {

        return `
    <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm relative group mb-6">

        <button type="button"
                class="absolute top-6 right-6 text-rose-500 font-bold text-sm">
            Supprimer
        </button>

        <span class="bg-indigo-600 text-white px-4 py-1 rounded-full text-xs font-black uppercase mb-4 inline-block">
            Question ${index + 1}
        </span>
<input type="hidden"
       name="questions[${index}][id]"
       value="${data && data.id ? data.id : ''}">

        <input type="text"
               name="questions[${index}][text]"
               value="${data ? data.text : ''}"
               placeholder="Posez votre question..."
               class="w-full px-0 py-3 text-xl font-bold border-b-2 border-slate-100 focus:border-indigo-500 outline-none mb-8"
               required>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            ${[0,1,2,3].map(optIndex => {

            const option =
                data && data.options[optIndex]
                    ? data.options[optIndex]
                    : null;

            return `
                <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-2xl">

                    <input type="radio"
                           name="questions[${index}][correct]"
                           value="${optIndex}"
                           ${option && option.is_correct == 1 ? 'checked' : ''}
                           class="w-5 h-5 accent-indigo-600"
                           required>

                    <input type="text"
                           name="questions[${index}][options][${optIndex}]"
                           value="${option ? option.text : ''}"
                           placeholder="Option ${optIndex + 1}"
                           class="bg-transparent flex-1 outline-none">

                </div>
                `;
        }).join('')}

        </div>
    </div>
    `;
    }

    document.getElementById('add-question-btn').addEventListener('click', () => {
        document.getElementById('questions-container').insertAdjacentHTML('beforeend', createQuestionBlock(questionIndex++));
    });

    // Ajouter une question par défaut
    window.onload = () => {

        if(existingQuestions.length > 0)
        {
            existingQuestions.forEach(question => {

                const html = createQuestionBlock(
                    questionIndex,
                    question
                );

                document
                    .getElementById('questions-container')
                    .insertAdjacentHTML('beforeend', html);

                questionIndex++;
            });

        } else {

            document
                .getElementById('add-question-btn')
                .click();
        }
    }
</script>
</body>
</html>