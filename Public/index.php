<?php
namespace App\public;

use App\app\Router;

define('ROOT', dirname(__DIR__));

// Inclure le fichier d'autoloading
require_once ROOT. '/vendor/autoload.php';
require_once ROOT. '/app/Autoload.php';
require_once ROOT. '/app/Router.php';

// Créer une instance du routeur
$router = new Router();

// Définir les routes

// Page d'accueil
$router->get('/', 'HomeController@index');

// Annonces
$router->get('/annonces', 'AnnoncesController@index');
$router->get('/annonces/{id}', 'AnnoncesController@show');
$router->post('/annonces', 'AnnoncesController@store');
$router->get('/annonces/{id}/edit', 'AnnoncesController@edit');
$router->post('/annonces/{id}/update', 'AnnoncesController@update');
$router->post('/annonces/{id}/delete', 'AnnoncesController@delete');

// Utilisateurs
$router->get('/utilisateurs', 'UtilisateursController@index');
$router->get('/utilisateurs/{id}', 'UtilisateursController@show');
$router->post('/utilisateurs', 'UtilisateursController@store');
$router->get('/utilisateurs/{id}/edit', 'UtilisateursController@edit');
$router->post('/utilisateurs/{id}/update', 'UtilisateursController@update');
$router->post('/utilisateurs/{id}/delete', 'UtilisateursController@delete');

// Gérer les erreurs 404
$router->setNotFoundHandler(function () {
    // Afficher une page d'erreur 404
    echo 'Page not found';
});

// Récupérer l'URI de la requête
$requestUri = $_SERVER['REQUEST_URI'];

// Récupérer la méthode HTTP de la requête
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Dispatcher la requête vers la méthode appropriée du contrôleur
$response = $router->dispatch($requestUri, $requestMethod);

// Afficher la réponse
echo $response;
