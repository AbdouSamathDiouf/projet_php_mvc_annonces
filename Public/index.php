<?php
// On definit une constante qui contient le dossier racine de notre projet
define('ROOT', dirname(__DIR__));

use App\vendor\autoload;
use App\src\Router;

// ON importe l'autoloader
require_once ROOT. '/vendor/autoload.php';
//autoload::register();
// Importer le routeur
require_once ROOT. '/src/Router.php';


//On instancie Router
 $app=new Router();

// On démarre l'application
$app->start(); 


