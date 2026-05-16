<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription Étudiant - EduQuiz</title>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

<div class="max-w-md w-full bg-white rounded-[2.5rem] p-10 shadow-xl border border-slate-100">

    <!-- Header -->
    <div class="text-center mb-10">
        <div class="w-12 h-12 bg-indigo-600 rounded-xl mx-auto mb-4 flex items-center justify-center text-white font-bold text-xl">
            S
        </div>
        <h2 class="text-2xl font-black text-slate-800">Espace Étudiant</h2>
        <p class="text-slate-400 text-sm font-medium">Créez votre compte pour commencer</p>
    </div>

    <!-- Errors -->
    <?php if (isset($_GET['error'])): ?>
        <p class="text-red-500 text-sm mb-4 text-center">
            Email already exists
        </p>
    <?php endif; ?>

    <form action="../Services/process_register.php" method="POST" class="space-y-5">

        <input type="hidden" name="role" value="student">

        <!-- Firstname -->
        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Prénom</label>
            <input type="text" name="firstname" required
                   class="w-full px-5 py-4 bg-slate-50 border rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none"
                   placeholder="Ahmed">
        </div>

        <!-- Lastname -->
        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nom</label>
            <input type="text" name="lastname" required
                   class="w-full px-5 py-4 bg-slate-50 border rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none"
                   placeholder="Benani">
        </div>

        <!-- Email -->
        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Email</label>
            <input type="email" name="email" required
                   class="w-full px-5 py-4 bg-slate-50 border rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none"
                   placeholder="ahmed@ecole.com">
        </div>

        <!-- Password -->
        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Mot de passe</label>
            <input type="password" name="password" required
                   class="w-full px-5 py-4 bg-slate-50 border rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 outline-none"
                   placeholder="••••••••">
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-black text-lg shadow-lg hover:bg-indigo-700 transition">
            Créer mon compte
        </button>

    </form>

    <p class="mt-8 text-center text-slate-400 text-xs font-bold uppercase">
        Déjà inscrit ?
        <a href="login.php" class="text-indigo-600 hover:underline">Se connecter</a>
    </p>

</div>

</body>
</html>