<?php

class Router 
{
    private $routes;

    function __construct($routesFile) 
    {
        $this->routes = $routesFile;
    }

    //Verify if url exist in routes
    private function verifyURL($url) 
    {
        if (! array_key_exists($url, $this->routes)) {
            return false;
        }
        return true;
    }

    //Routing process
    public function makeRoute($url) 
    {   
        if ($this->verifyURL($url)) {
            return $this->routes[$url];
        }
        throw new Exception('The address is incorrect or unavailable.');
    }
}