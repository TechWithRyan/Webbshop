<?php 
include_once('./../Class/orderClass.php');

function getAllFromUser($customer) {
   
    include_once('./../Class/database.php');
    $database = new Database();
    
    $query = <<<EOD
    SELECT *
    FROM `order` AS o 
    INNER JOIN orderdetails AS pd
    ON o.orderID = pd.orderID 
    INNER JOIN product as p 
    ON pd.productID = p.productID
    WHERE o.customerID = :customer;
    EOD;
    $statement = $database->connection->prepare($query);
    $statement->bindParam(':customer', $customer[0]["customerID"], PDO::PARAM_INT); 
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (empty($result)) {
        throw new exception('No order found', 404);
        exit;
    }
    return $result; 
}

function createFullPurchase($o){
    $order = new Order(null, $o["shipperID"], $o["customerID"], $o["date"], $o["sum"]);
    $order->create();
    for($i = 0; $i < sizeof($o["details"]); $i++){
        $order->createDetail($o["details"][$i]);
    }

}

function getAllOrders() {
    include_once('./../Class/database.php');
    $database = new Database();
    
    $query = <<<EOD
    SELECT o.orderID, o.date,o.sum, pd.quantity, pd.sum, p.name, p.price
    FROM `order` AS o 
    INNER JOIN orderdetails AS pd
    ON o.orderID = pd.orderID 
    INNER JOIN product as p 
    ON pd.productID = p.productID
    EOD;
    $statement = $database->connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($result)) {
        throw new exception('No order found', 404);
        exit;
    }
    return $result; 
}

function getAllSubscribers() {
    include_once('./../Class/database.php');
    $database = new Database();
    
    $query = <<<EOD
    SELECT subscriptionID, fName, lName, email FROM subscription
    EOD;
    $statement = $database->connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($result)) {
        throw new exception('No order found', 404);
        exit;
    }
    return $result; 
}


function getAllChangeProducts() {
    include_once('./../Class/database.php');
    $database = new Database();
    
    $query = <<<EOD
    SELECT productID, name, inStock FROM product;
    EOD;
    $statement = $database->connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($result)) {
        throw new exception('No order found', 404);
        exit;
    }
    return $result; 
}


?>
    