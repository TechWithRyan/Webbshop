<?php

     
class Database {
    public $connection;
    

    function __construct() {
        $dsn = 'mysql:host=localhost;dbname=webshop';
                $user = 'root';
                $password = 'root';
               
        try {
            $this->connection = new PDO($dsn, $user, $password);
            $this->connection->exec('set names utf8');

            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
            
        } catch(PDOException $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }
    
}

?>
