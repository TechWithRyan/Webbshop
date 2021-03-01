<?php
session_start();
 
/* try {
    if (!isset($_SESSION['loggedinUser'])) {
        throw new Exception('Not authorized', 403);
    } else if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if($_POST['endpoint'] == 'getAll') {

            include('./../Handlers/orderHandler.php');
            $user = unserialize($_SESSION['user']);
            $result = getAll($user);
            echo json_encode($result); 

        }else if($_POST['endpoint'] == 'createOrder') {
            $order = json_decode($_POST['sortedCart'], true);
            include('./../Handlers/orderHandler.php');

            $result = createPurchase($order["userId"], $order["shipperID"], $order["date"], $order["sum"]); 
            
             for($i = 0; $i < sizeof($order["details"]); $i++){
                createPurchaseDetail($result, $order["details"][$i]["productID"], $order["details"][$i]["quantity"], $order["details"][$i]["sum"]);
            }


            echo json_encode($order["details"][1]["productID"]);
        } else {
            throw new Exception('Not a valid endpoint', 501);
        }


    } else if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if($_GET['endpoint'] == 'getAllFromUser') {
 
            include('./../Handlers/orderHandler.php');
            $userId = unserialize($_SESSION['loggedinUser'])['userID'];
            error_log($userId);
            $result = getAllFromUser($userId);
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
} */

try {
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    if ($_GET["action"] == "getOne"){
        include('./../Handlers/orderHandler.php');
        $id = $_GET["ID"];
        echo json_encode(array_search($id, array_column($stockInfo, 'ID')));        
        exit;
    }else if ($_GET["action"] == "getAllProcutsInStock"){
        include('./../Handlers/orderHandler.php');
        //$stockInfo = getAllProcutsInStock();
        echo json_encode($stockInfo); 
        exit;  
    }
}
    
} catch(Exception $e2) {
    echo json_encode(array('Message' => $e2->getMessage(), 'status' => $e2->getCode()));
    exit;
}
?>