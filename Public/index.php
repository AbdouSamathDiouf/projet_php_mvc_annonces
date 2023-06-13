<?php
// require_once __DIR__ . '/../vendor/autoload.php';
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
die(ROOT);
$p="monprojet";
$url = explode("/", $p);
var_dump($url);

if($url[0] != "") {
    $controller = ucfirst($url[0]);
    echo $controller;

    $action = isset($url[1]) ? $url[1] : 'index';
    require_once(ROOT.'Controllers/'.$controller.'.php');
    $controller = new $controller();
    if(method_exists($controller, $action)) {
        $controller->$action;
    } else {
        http_response_code(404);
        echo "La page demandée n'existe pas";
    }
    
} else {
    
}

