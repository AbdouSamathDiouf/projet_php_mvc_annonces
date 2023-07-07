<?php
namespace App\app;

class Router
{
    private $routes = [];

    public function get($route, $action)
    {
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action)
    {
        $this->routes['POST'][$route] = $action;
    }

    public function setNotFoundHandler($action)
    {
        $this->routes['404'] = $action;
    }

    public function dispatch($requestUri, $requestMethod)
    {
        foreach ($this->routes[$requestMethod] as $route => $action) {
            if ($this->isRouteMatch($route, $requestUri)) {
                // Extraire les paramètres de l'URL
                $params = $this->getRouteParams($route, $requestUri);

                // Appeler la méthode du contrôleur correspondant à la route
                return $this->callAction($action, $params);
            }
        }

        // Aucune route correspondante trouvée, renvoyer une réponse 404
        if (isset($this->routes['404'])) {
            return $this->callAction($this->routes['404']);
        } else {
            return 'Page not found';
        }
    }

    private function isRouteMatch($route, $requestUri)
    {
        $pattern = str_replace('/', '\/', $route);
        $pattern = '/^' . $pattern . '$/';

        return preg_match($pattern, $requestUri);
    }

    private function getRouteParams($route, $requestUri)
    {
        $pattern = str_replace('/', '\/', $route);
        $pattern = '/^' . $pattern . '$/';

        preg_match_all('/{(\w+)}/', $route, $paramNames);
        preg_match($pattern, $requestUri, $paramValues);

        $params = [];
        for ($i = 1; $i < count($paramNames[1]); $i++) {
            $params[$paramNames[1][$i]] = $paramValues[$i];
        }

        return $params;
    }

    private function callAction($action, $params = [])
    {
        if (is_callable($action)) {
            return call_user_func_array($action, $params);
        } else {
            // Extraire le nom du contrôleur et la méthode de l'action
            list($controllerName, $methodName) = explode('@', $action);

            // Inclure le fichier du contrôleur
            require_once ROOT. '/controllers/' . $controllerName . '.php';
            

            // Créer une instance du contrôleur
            $controller = new $controllerName();

            // Appeler la méthode du contrôleur avec les paramètres
            return call_user_func_array([$controller, $methodName], $params);
        }
    }
}
