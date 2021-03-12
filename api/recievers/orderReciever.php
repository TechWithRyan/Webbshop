<?php
session_start();

/* try {
    
    if($_GET['endpoint'] == 'checkInStock') {
        include('./../Handlers/orderHandler.php');
        $result = checkInStock();
        echo json_encode($result);
        
    }
     if($_POST['endpoint'] == 'createOrder') {
        $order = json_decode($_POST['sortedCart'], true);
        include('./../Handlers/orderHandler.php');
$orderjson = json_encode($order);
error_log($orderjson);
        //$status = gettype($order);
        //error_log($status);     
        //error_log($result);
        $result = createPurchase($order["customerID"], $order["shipperID"], $order["date"], $order["sum"]); 
        //echo $order['customerID'];
                 for($i = 0; $i < sizeof($order["details"]); $i++){
            createPurchaseDetail($result, $order["details"][$i]["productID"], $order["details"][$i]["quantity"], $order["details"][$i]["sum"]);
        }
        echo json_encode(true); 
    } else {
        throw new Exception('Not a valid endpoint', 501);
    }
   
} catch(Exception $e) {
    echo json_encode(array('Message' => $e->getMessage(), 'status' => $e->getCode()));
    exit;
}  */
 
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
            $result = createPurchase($order["customerID"], $order["shipperID"], $order["date"], $order["sum"]); 
            
             for($i = 0; $i < sizeof($order["details"]); $i++){
                createPurchaseDetail($result, $order["details"][$i]["productID"], $order["details"][$i]["quantity"], $order["details"][$i]["sum"]);
            }


            echo json_encode(true);
        } else {
            throw new Exception('Not a valid endpoint', 501);
        }


    } else if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if($_GET['endpoint'] == 'getAllFromUser') {
 
            include('./../Handlers/orderHandler.php');
            $customerID = unserialize($_SESSION['loggedinUser'])['customerID'];
            error_log($customerID);
            $result = getAllFromUser($customerID);
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
            throw new Exception('Not a valid endpoint', 501);
        }
 
    } else {
        throw new Exception('Not a valid request method', 405);
    }
 
} catch(Exception $e) {
    echo json_encode(array('Message' => $e->getMessage(), 'status' => $e->getCode()));
}

?>