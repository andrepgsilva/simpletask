<?php
namespace Core\Database;

class QueryBuilder 
{
    private $conn;

    public function __construct($connection) 
    {
        $this->conn = $connection;
    }
    
    public function insert($table, $attr, $values) 
    {
        //Split Attributes
        $all_attr = implode(',', $attr);
        //Add '?' operator equal number of values to after put on query  
        $val_operator = implode( ',', array_map(function($item) {
            return $item = '?';
        }, $values) );
        $query = "INSERT INTO {$table} " . "({$all_attr}) " . "VALUES ({$val_operator})";
        $query = $this->conn->prepare($query);
        return $query->execute($values);
    }

    public function findAll($table) 
    {
        $query = $this->conn->prepare("SELECT * FROM {$table}");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
}