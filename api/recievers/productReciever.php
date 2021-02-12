<?php 

try {

    if(isset($_SERVER["REQUEST_METHOD"])) {

        require("../repositories/productRepository.php");

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            // Get all
            getAllProducts();

        } else if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if($_POST["action"] == "deleteAll") {
                // Delete all

            } else if ($_POST["action"] ==  "add"){
                // Add new
                
            }

    } else {
        throw new ErrorException("Wrong request method", 500);
    }
    
} else {
    throw new ErrorException("No request method set", 500);
}



} catch(Exception $e){
    http_response_code($e->getCode());
    echo json_encode(array("status" => $e->getCode(), "Message" => $e->getMessage()));
}

?>