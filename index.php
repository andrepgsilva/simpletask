<?php
//Loading classes with composer autoload
require 'vendor/autoload.php';
use Core\Router;

//Routing process
(new Router(require('routes.php')))
    ->makeRoute(
        array(
            trim(explode('?', $_SERVER['REQUEST_URI'])[0], '/'),
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['QUERY_STRING']   
        )
    );