<?php
// On definit une constante qui contient le dossier racine de notre projet
define('ROOT', dirname(__DIR__));
var_dump(ROOT);

use App\vendor\autoload;
use App\src\Router;

// ON importe l'autoloader
require_once ROOT. '/vendor/autoload.php';

//On instancie Router
$app=new Router();

// One démarre l'application
$app->start();


