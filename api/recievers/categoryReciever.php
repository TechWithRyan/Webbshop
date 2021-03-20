<?php

try {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if($_POST['endpoint'] == 'add') {

            //reserverad plats för nån post eller annan metod

        } else {
            throw new Exception('Not a valid endpoint category', 501);
        }


    } else if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if($_GET['endpoint'] == 'getAll') {

            include('./../Handlers/categoryHandler.php');
            $result = getAllProducts();
            echo json_encode($result); 

        }else if($_GET['endpoint'] == 'getDiscount') {

            include('./../Handlers/categoryHandler.php');
            $result = getDiscount();
            echo json_encode($result); 

        }else if($_GET['endpoint'] == 'getSpecific') {

            include('./../Handlers/categoryHandler.php');
            $result = getSpecific($_GET['categorytoSend']);
            echo json_encode($result); 

        }else  {
            throw new Exception('Not a valid endpoint', 501);
        }

    } else {
        throw new Exception('Not a valid request method', 405);
    }

} catch(Exception $e) {
    echo json_encode(array('Message' => $e->getMessage(), 'status' => $e->getCode()));
}

?>