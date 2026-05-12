<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="min-h-screen bg-slate-50 flex items-center justify-center p-6">
    <div class="max-w-xl w-full bg-white rounded-[2.5rem] shadow-2xl p-10 text-center border-4 border-indigo-50">
        <div class="mb-8">
            <div class="relative w-40 h-40 mx-auto">
                <svg class="w-full h-full" viewBox="0 0 36 36">
                    <path class="text-slate-100" stroke-width="3" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="text-indigo-600" stroke-dasharray="75, 100" stroke-width="3" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-4xl font-black text-slate-800">15/20</span>
                </div>
            </div>
        </div>

        <h2 class="text-3xl font-bold text-slate-800 mb-2">Félicitations ! 🎉</h2>
        <p class="text-slate-500 mb-8 font-medium">Vous avez validé ce module avec succès.</p>

        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="bg-green-50 p-4 rounded-3xl border border-green-100">
                <p class="text-[10px] text-green-600 font-black uppercase tracking-widest">Correctes</p>
                <p class="text-2xl font-bold text-green-700">15</p>
            </div>
            <div class="bg-rose-50 p-4 rounded-3xl border border-rose-100">
                <p class="text-[10px] text-rose-600 font-black uppercase tracking-widest">Fausses</p>
                <p class="text-2xl font-bold text-rose-700">5</p>
            </div>
        </div>

        <div class="space-y-3">
            <button class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all">Voir la correction détaillée</button>
            <button class="w-full py-4 text-slate-500 font-bold hover:bg-slate-50 rounded-2xl transition-all">Retour au catalogue</button>
        </div>
    </div>
</div>
</body>
</html>