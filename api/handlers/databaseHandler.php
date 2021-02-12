<?php 

class Database {

    function __construct() {
        $dns = "mysql:host=localhost;dbname=webshop";
        $user = "root";
        $pass = "root";

        $this->db = new PDO($dns, $user, $pass);
        $this->db->exec("set names utf8");
    }

    public $db;

    function communicationTest() {
        $preparedQuery = $this->db->prepare("SELECT * FROM product;");
        $preparedQuery->execute();
        echo json_encode($preparedQuery->fetchAll());
        //$resultArr = $preparedQuery->fetchAll(PDO::FETCH_ASSOC);
        //echo json_encode($resultArr[2]["name"]);
        exit;
    }
}

?>