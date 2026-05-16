<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription Formateur</title>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

<div class="max-w-md w-full bg-white rounded-3xl p-10 shadow-xl border border-slate-100">

    <!-- Header -->
    <div class="text-center mb-8">
        <h2 class="text-2xl font-black text-slate-800">Espace Formateur</h2>
        <p class="text-slate-500 text-sm">Créer un compte formateur</p>
    </div>

    <!-- FORM -->
    <form action="../Services/process_register.php" method="POST" class="space-y-5">

        <!-- ROLE -->
        <input type="hidden" name="role" value="prof">

        <!-- Firstname -->
        <div>
            <label class="text-xs font-bold text-slate-500 uppercase">Prénom</label>
            <input type="text" name="firstname" required
                   class="w-full mt-1 px-4 py-3 border rounded-xl bg-slate-50 focus:ring-2 focus:ring-indigo-500 outline-none"
                   placeholder="Prénom">
        </div>

        <!-- Lastname -->
        <div>
            <label class="text-xs font-bold text-slate-500 uppercase">Nom</label>
            <input type="text" name="lastname" required
                   class="w-full mt-1 px-4 py-3 border rounded-xl bg-slate-50 focus:ring-2 focus:ring-indigo-500 outline-none"
                   placeholder="Nom">
        </div>

        <!-- Email -->
        <div>
            <label class="text-xs font-bold text-slate-500 uppercase">Email</label>
            <input type="email" name="email" required
                   class="w-full mt-1 px-4 py-3 border rounded-xl bg-slate-50 focus:ring-2 focus:ring-indigo-500 outline-none"
                   placeholder="email@exemple.com">
        </div>

        <!-- Password -->
        <div>
            <label class="text-xs font-bold text-slate-500 uppercase">Mot de passe</label>
            <input type="password" name="password" required
                   class="w-full mt-1 px-4 py-3 border rounded-xl bg-slate-50 focus:ring-2 focus:ring-indigo-500 outline-none"
                   placeholder="••••••••">
        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
            Créer compte
        </button>

    </form>

    <!-- LOGIN LINK -->
    <p class="text-center text-xs text-slate-400 mt-6">
        Déjà inscrit ?
        <a href="login.php" class="text-indigo-600 font-bold hover:underline">Se connecter</a>
    </p>

</div>

</body>
</html>