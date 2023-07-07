<?php
namespace App\app;
use Exception;
spl_autoload_register(function ($className) {
    // Définir le chemin racine de votre application
    $rootPath = ROOT . '/..';

    // Remplacer les backslashes par des slashes dans le nom de classe
    $className = str_replace('\\', '/', $className);

    // Chemin du fichier de classe
    $filePath = $rootPath . '/' . $className . '.php';

    // Vérifier si le fichier de classe existe
    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        // Gérer l'erreur de classe introuvable selon vos besoins
        throw new Exception("Classe introuvable : $className");
    } 
});
