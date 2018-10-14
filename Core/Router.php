<?php
namespace Core;

class Router 
{
    private $routes;

    function __construct($routesFile) 
    {
        $this->routes = $routesFile;
    }

    //Verify if url exist in routes
    private function verifyURL($request) 
    {
        if (! array_key_exists($request[0], $this->routes[$request[1]])) {
            return false;
        }
        return true;
    }

    public function makeRoute($request) 
    {   
        if ($this->verifyURL($request)) {
            //Get request method and URL
            $route = $this->routes[$request[1]][$request[0]];
            list($controller, $action) = explode('@', $route);
            $controller = '\App\Controllers\\' . $controller . 'Controller';
            return (new $controller())->$action();
        }
        redirectTo('/simpletask');
    }
}