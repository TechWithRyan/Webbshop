<?php
include_once('./../Class/newsletterClass.php');

function postNewsletter($email, $fName, $lName){
    
    $letter = new Newsletter($email, $fName, $lName);
    $letter->create();
    
    if (empty($letter)){
        throw new exception('No Newsletter found to send', 404);
        exit;
    }
    return $letter;
    
}

?>

