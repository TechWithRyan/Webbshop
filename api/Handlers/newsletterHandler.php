<?php

function postNewsletter($email, $fName, $lName){
    include_once('./../Class/database.php');
    
    $database = new Database(); 
      
    $sth = $database->connection->prepare('INSERT INTO subscription (email, fName, lName)
                                                    VALUES (:email, :fName, :lName)');
    $sth->bindParam(':email', $email);
    $sth->bindParam(':fName', $fName);
    $sth->bindParam(':lName', $lName);
                                                    
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    return $result; 
}

?>

