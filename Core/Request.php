<?php
namespace Core;
class Request 
{
    private function __construct() {}

    //Verify if url exist in routes
    public static function verifyURL($request, $routes) 
    {
        //$request[0] will be the url and $request[1] the request type 
        if (! array_key_exists($request[0], $routes[$request[1]])) {
            return false;
        }
        return true;
    }

    //Verify existence of parameters
    private static function verifyParams($parameters) 
    {
        if (! empty($parameters)) {
            return $parameters;
        }
        return false;
    }

    //Convert params for pass to controller
    private static function convertParams($parameters) 
    {
        $all_params = [];

        //Split params that will be passed to array
        $split_param = function($param) use (&$all_params) {
            $param = explode('=', $param);
            $all_params[$param[0]] = $param[1];
        };

        if (strpos($parameters, '&')) {
            array_map($split_param, explode('&', $parameters));
        } else {
            $split_param($parameters);
        }
        return $all_params;
    }

    //Builds parameters in case they exists
    public static function buildParameters($raw_params)
    {
        $parameters = static::verifyParams($raw_params);
        if ($parameters) {
            $parameters = static::convertParams($parameters);
            return $parameters;
        } 
        return false;
    }

}