<?php
function getAll() {
    include_once('./../Class/database.php');
    $database = new Database();

    $query = $database->connection->prepare('SELECT * FROM customer;');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        throw new exception('No user found', 404);
        exit;
    }
    return $result; 
}

function login($uname, $pw){
    $loggedinUser = getSpecific($uname, $pw);
    return $loggedinUser;

}
function getSpecific($uname, $pw){
    include_once('./../Class/database.php');
    $database = new Database(); 
    $hashedPW = hash("md5", $pw);

    $query = $database->connection->prepare('SELECT * FROM customer WHERE email = :email AND password = :password;');
    $query->execute(array(':email' => $uname, ':password' => $hashedPW));
    
    $result = $query->fetchAll(\PDO::FETCH_ASSOC);
 
    if (empty($result)) {
        throw new exception('No user found', 404);
        exit;
    }
    return $result; 
}

function registerNewUser($fName, $lName, $email, $phone, $password, $city, $postalcode, $country, $street){

    include_once('./../Class/database.php');
    $database = new Database();
    $hashedpass = hash("md5", $password);

    try {

        $database->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $qry = $database->connection->prepare('INSERT INTO customer (fName, lName, email, phone, password, isAdmin, city, postalcode, country, street) 
                                VALUES (:fName, :lName, :email, :phone, :password, 0, :city, :postalcode, :country, :street);');

        $qry->execute(array(':fName' => $fName, 
                            ':lName' => $lName,     
                            ':email' => $email, 
                            ':phone' => $phone, 
                            ':password' => $hashedpass, 
                            ':city' => $city, 
                            ':postalcode' => $postalcode, 
                            ':country' => $country, 
                            ':street' => $street));

        
    } catch(PDOException $e) {
        error_log($e->getMessage());
        throw $e;
    }
}

?>