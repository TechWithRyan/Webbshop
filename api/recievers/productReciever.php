<?php

try {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['endpoint'] == 'updateInStock') {

            include('./../Handlers/productHandler.php');
            $result = updateInStock($_POST["inStock"], $_POST["productID"]);
            echo json_encode($result); 

        } else {
            throw new Exception('Not a valid endpoint', 501);
        }


    } else if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if($_GET['endpoint'] == 'getAll') {

            include('./../Handlers/productHandler.php');
            $result = getAll();
            echo json_encode($result); 

        } else {
            throw new Exception('Not a valid endpoint', 501);
        }

    } else {
        throw new Exception('Not a valid request method', 405);
    }

} catch(Exception $e) {
    echo json_encode(array('Message' => $e->getMessage(), 'status' => $e->getCode()));
}

?>