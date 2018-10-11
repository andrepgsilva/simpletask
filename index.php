<?php
//Loading classes with bootstrap.php
require 'Core/bootstrap.php';

//Routing process
require (new Router(require('routes.php')))
        ->makeRoute(
            trim($_SERVER['REQUEST_URI'], '/')   
        );

