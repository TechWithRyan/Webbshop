<?php

class Database{
    function __construct(){
        $dns = "mysql:host=localhost;dbname=f4b";
        $user = "root";
        $pass = "root";
        
        $this->db=new PDO($dns, $user, $pass);
        $this->db->exec("set names utf8");

    }
public $db;

private function prepareQuery($query){
   return $this->db->prepare($query);
}

public function runQuery($query, $entity){
    $preparedQuery = $this->prepareQuery($query);
    $status = $preparedQuery->execute($entity);
   
    return array("status" => $status, "message" => $preparedQuery->errorInfo(), "index" => $this->db->lastInsertId());

    
}


 public function fetchQuery($query){
    $preparedQuery = $this->prepareQuery($query);
    $preparedQuery->execute();
    return $preparedQuery->fetchAll(PDO::FETCH_ASSOC); 
    
}


}


    

?>