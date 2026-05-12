<?php
// autoload.php - À inclure UNE SEULE FOIS dans toute l'application
spl_autoload_register(function ($class) {
    // Convertir le namespace en chemin de fichier
    $base_dir = __DIR__ . '/src/';

    // Remplacer les backslashes par des slashes
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';

    // Vérifier si le fichier existe
    if (file_exists($file)) {
        require_once $file;  // Utilise require_once ici
        return true;
    }
    return false;
});
