<?php

function dd($var) 
{
    die(var_dump($var));
}

function router($url, $routes) 
{
    if (array_key_exists($url, $routes)) {
        return $routes[$url];
    }
}