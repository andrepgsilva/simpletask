<?php
namespace Core;
use Core\Request;

class Router 
{
    private $routes;

    function __construct($routesFile) 
    {
        $this->routes = $routesFile;
    }

    //Builds the way to control
    private function buildControllerPath($request)
    {
        //Get request method and URL
        $route = $this->routes[$request[1]][$request[0]];
        list($controller, $action) = explode('@', $route);
        //Make a way to controller
        $controller = '\App\Controllers\\' . $controller . 'Controller';
        return compact('controller', 'action');
    } 

    public function makeRoute($request) 
    {   
        if (Request::verifyURL($request, $this->routes)) {
            //Get Controller elements(controller, action)
            extract($this->buildControllerPath($request));
            $parameters = Request::buildParameters($request[2]);
            try {
                return (new $controller())->$action();
            } catch(\Error $err) {
                return (new $controller())->$action($parameters);
            }
        }
        redirectTo('/simpletask');
    }
}