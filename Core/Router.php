<?php

class Router 
{
    private $routes;

    function __construct($routesFile) 
    {
        $this->routes = $routesFile;
    }

    //Verify if url exist in routes
    private function verifyURL($url, $request_type) 
    {
        if (! array_key_exists($url, $this->routes[$request_type])) {
            return false;
        }
        return true;
    }

    //Routing process
    public function makeRoute($url, $request_type) 
    {   
        if ($this->verifyURL($url, $request_type)) {
            return $this->routes[$request_type][$url];
        }
        header('Location: /simpletask/');
    }
}