<?php

function dd($var) 
{
    die(var_dump($var));
}

function view($name, $vars = array()) 
{
    //To unpack variable that controller passed
    extract($vars);
    require 'Views/' . $name . '.view.php';
}

function redirectTo($page) 
{
    return header("Location: {$page}");
}