<?php

require 'Core/bootstrap.php';
$url = $_SERVER['REQUEST_URI'];
$routes = require('routes.php');
require router(trim($url, '/'), $routes);




