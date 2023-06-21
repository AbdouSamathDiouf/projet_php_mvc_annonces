<?php 
namespace App\src;
use App\Controllers\MainController;

require_once ROOT. '/Controllers/MainController.php';
class Router {
    public function start() {
      // On rétire le "trailing slash" éventuel de l'url
      $url = $_SERVER['REQUEST_URI'];
      

      // On va verifier que url n'est pas vide et se termine avec un "/"
      if(!empty($url) && $url != '/' && $url[-1] === "/") {
        $url = substr($url, 0, -1);

        // On envoie un code de rédirection permenente
        http_response_code(301);

        // On redirige vers l'URL sans "/"
        header('Location: '.$url);
      }

      // Gérer les paramétres d'URL 
      //p=Controleur/methode/paramétres
      // Séparer les paramétres dans un tableau
      
      $params = explode('/', $_GET['p']?? '');
       //var_dump($params);
      if($params[0] != '') {
        // On a au mois un paramétre
        // On récupère le nom du controleur à instancier
        // On met une majuscule en Prémière lettre, on ajoute le namesapce complet avant et on ajoute "Controllers" après
        $controller = `\\App\\Controllers`.ucfirst(array_shift($params)).'Controller';
        // On instancie le controleur
        $controller = new $controller();

        // On appelle la methode index (Deuxième paramétre de l'URL)

        $action= (isset($params[0])) ? array_shift($params) : 'index';

        if(method_exists($controller, $action)) {
            // s'il reste de paramétres, on les passe à la méthodes sous forme de tableau
            (isset($params[0])) ? $controller->$action($params) : $controller->$action();
        } else {
            http_response_code(404);
            echo "La page recherchée n'existe pas !";
        }

      } else {
        // On a pas de paramétres, on instancie le controleur par defaut
       
        $controller = new MainController;
        $controller->index();
      }
    }
}
