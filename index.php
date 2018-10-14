<?php
//Loading classes with composer autoload
require 'vendor/autoload.php';
use Core\Router;

//Routing process
(new Router(require('routes.php')))
    ->makeRoute(
        array(
            trim($_SERVER['REQUEST_URI'], '/'),
            $_SERVER['REQUEST_METHOD']
        )
    );