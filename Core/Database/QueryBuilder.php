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
        $val_operator = substr(str_repeat('?,', count($values)), 0, -1);
        $query = "INSERT INTO {$table} " . "({$all_attr}) "
                 . "VALUES ({$val_operator})";
        if (in_array('id', $attr)) 
        {
            $id_index = array_search('id', $attr);
            if ($this->find($values[$id_index], $table)) {
                //Move id to end of array
                unset($attr[$id_index]);
                $values[] = $values[$id_index];
                unset($values[$id_index]);
                $values = array_values($values);
                //Add '?' operator to attr names
                $params = array_map(function($value){
                    return $value . '=?,';
                }, $attr);
                $params = substr(implode("", $params), 0, -1);
                $query = "UPDATE {$table} " . 'SET '. "{$params} "
                        . "WHERE id=?";
            }
        }
        $query = $this->conn->prepare($query);
        return $query->execute($values);
    }

    public function find($id, $table) 
    {
        $query = $this->conn->prepare("SELECT * FROM {$table} WHERE id=?");
        $query->bindValue(1, $id);
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }

    public function findAll($table) 
    {
        $query = $this->conn->prepare("SELECT * FROM {$table}");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function delete($table, $id) 
    {
        $query = $this->conn->prepare(
            "DELETE FROM {$table}" .
            ' WHERE id = ?'
        );
        $query->bindValue('1', $id);
        $query->execute();
    }
}