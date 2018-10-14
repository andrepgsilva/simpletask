<?php
namespace Core;

class App 
{
    static $dependencies = array();

    private static function verifyDependency($name)
    {
        if (array_key_exists($name, static::$dependencies)) {
            return true;
        }
    }

    public static function bind($name, $dependency)
    {
        if (! static::verifyDependency($name)) {
            return static::$dependencies[$name] = $dependency;
        }
        throw new Exception('Dependency already exists');
    }

    public static function get($name) 
    {
        if (static::verifyDependency($name)) {
            return static::$dependencies[$name];
        }
        throw new Exception('Dependency doesn\'t exist in DI');        
    }
}