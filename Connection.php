<?php

final class Connection
{
    private function __construct() {}
    private function __clone() {}

    public static function connect($cfg) 
    {
        try {
            return $pdo = new PDO
            ( 
                $cfg['db']['type'] .
                ":host={$cfg['db']['host']}; dbname={$cfg['db']['name']}" ,
                $cfg['db']['username'] , $cfg['db']['password'] ,
                $cfg['db']['options'] 
            );
        } catch (PDOException $error) {
            die("can't connect the database!");
        }
    }
}