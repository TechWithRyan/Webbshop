<?php
session_start();


 
try {
    if (!isset($_SESSION['loggedinUser'])) {
        throw new Exception('Not authorized', 403);
    } else if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if($_POST['endpoint'] == 'getAll') {

            include('./../Handlers/orderHandler.php');
            $customer = unserialize($_SESSION['customer']);
            $result = getAll($customer);
            echo json_encode($result); 

        }else if($_POST['endpoint'] == 'createOrder') {
            $order = json_decode($_POST['sortedCart'], true);
            include('./../Handlers/orderHandler.php');
            createFullPurchase($order);
            echo json_encode(true);
        } else {
            throw new Exception('Not a valid endpoint', 501);
        }

    } else if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if($_GET['endpoint'] == 'getAllFromUser') {
            
            include('./../Handlers/orderHandler.php');
            $customer = unserialize($_SESSION['loggedinUser']);
            $result = getAllFromUser($customer);
            echo json_encode($result); 
                       

        } else if($_GET['endpoint'] == 'getAllOrder') {
 
            include('./../Handlers/orderHandler.php');
            $result = getAllOrders();
            echo json_encode($result); 
 
        } else if($_GET['endpoint'] == 'getAllSubscribers') {
 
            include('./../Handlers/orderHandler.php');
            $result = getAllSubscribers();
            echo json_encode($result); 
 
        } else if($_GET['endpoint'] == 'getAllChangeProducts') {
 
            include('./../Handlers/orderHandler.php');
            $result = getAllChangeProducts();
            echo json_encode($result); 
 
        } else {
            throw new Exception('Not a valid endpoint2', 501);
        }
 
    } else {
        throw new Exception('Not a valid request method', 405);
    }
 
} catch(Exception $e) {
    echo json_encode(array('Message' => $e->getMessage(), 'status' => $e->getCode()));
}

?>