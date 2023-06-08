<?php

class Model extends Database 
{
    public $errors = array();
    function __construct()
    {
        //echo $this::class;
        if(!property_exists($this, 'table'))
        {
            $this->table = strtolower( $this::class) . "s";
        }

    }
    public function where($column, $value)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value;";
        return $this->query($query, [
            'value' => $value,
            
        ]);
    }
    public function getLastWeek($row, $column, $value)
    {
        $column = addslashes($column);
        $query = "select SUM($row) AS value_sum from $this->table where $column = :value ORDER BY id DESC LIMIT 7;";
        return $this->query($query, [
            'value' => $value,
            
        ]);
    }
    public function findAll()
    {
        $query = "select * from $this->table";
        return $this->query($query);
    }

    public function addObject($data)
    {
        
        $keys = array_keys($data);
        $columns = implode(",", $keys);
        $values = implode(",:", $keys);
        $query = "INSERT INTO $this->table ( $columns ) VALUES (:$values);";       
        return $this->query($query,$data);   
    }
    public function addEmptyObject($userID)
    {
        $query = "INSERT INTO `reports` ( work, sport, nutrition, alcohol,drugs, sleep, general, users_id) VALUES ('0', '0', '0', '0', '0', '0', '0', current_timestamp(), $userID);";       
        return $this->query($query);   
    }
    public function updateObject($id, $data)
    {
        $str = "";
        foreach($data as $key => $value)
        {
            $str .= $key . "=:" . $key. ",";
        }
        $str = trim($str,",");
        $data['id'] = $id;
        $query = "UPDATE $this->table SET $str WHERE id = :id"; 
        //echo $query;    
        return $this->query($query,$data);   
    }
    

    public function deleteObject($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id"; 
        $data['id'] = $id;
        return $this->query($query,$data);  
    }
    public function reset($id)
    {
        $query = "DELETE FROM $this->table WHERE users_id = :id"; 
        $data['id'] = $id;
        return $this->query($query,$data);  
    }
    
}
