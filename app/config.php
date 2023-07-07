<?php
namespace App\app;
// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'projet-mvc');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Configuration des chemins d'accès
define('ROOT', dirname(__DIR__) . '/');
define('PUBLIC_PATH', ROOT . 'public/');
define('TEMPLATES_PATH', ROOT . 'templates/');

// Autres configurations
define('SITE_NAME', 'Mon Site de Petites Annonces');
define('DEFAULT_CONTROLLER', 'annonce');
define('DEFAULT_ACTION', 'index');
