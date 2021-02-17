<?php

function getAllShippers(){
        include_once('./../Class/database.php');
        $database = new Database();
    
        $query = $database->connection->prepare('SELECT * FROM shipper;');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
        if (empty($result)) {
            throw new exception('Something went wrong', 404);
            exit;
        }
        return $result; 
    }