<?php 

/* function getAllProcutsInStock (){
    include_once('./../Class/database.php');
    $database = new Database();

    $query = $database->connection->prepare('SELECT ID, `name`, inStock FROM product;');
    $query->execute();
    $stockInfo = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($stockInfo)) {
        throw new exception('No Product in stock was found', 404);
        exit;
    }
    return $stockInfo; 
} */



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



function createPurchase($customerID, $shipperID, $date, $sum){
    //return $customerID;
    //$status = empty($date);
    //error_log($status);
    include_once('./../Class/userClass.php');
    include_once('./../Class/database.php');
    $database = new Database();
    $datum = $date;
    
    try {
        $sql_array = array(':customerID' => $customerID, 
        ':shipperID' => $shipperID,
        ':datum' => $datum, 
        ':sum' => $sum);
        $database->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry = $database->connection->prepare('INSERT INTO `order` (customerID, shipperID, `date`, `sum`)
         VALUES (:customerID, :shipperID, :datum, :sum);');
        $qry->execute(array(':customerID' => $customerID, 
                            ':shipperID' => $shipperID,     
                            ':datum' => $datum, 
                            ':sum' => $sum));
                            $id = $database->connection->lastInsertId();
                            
                            return $id;
                            //$result = $query->fetch(PDO::FETCH_ASSOC);
        
    } catch(PDOException $e) {
        error_log($e->getMessage());
        throw $e;
    }
}
function createPurchaseDetail($purchaseID, $productID, $quantity, $sum){
    // include_once('./../Class/userClass.php');
    include_once('./../Class/database.php');
    $database = new Database();
    
    try {

        $database->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $qry = $database->connection->prepare('INSERT INTO orderDetails (orderID, productID, quantity, sum) 
                                VALUES (:purchaseID, :productID, :quantity, :sum); 
                                UPDATE product
                                SET inStock = ifNull(inStock,0) - :quantity
                                WHERE productID = :productID');

        $qry->execute(array(':purchaseID' => $purchaseID, 
                            ':productID' => $productID,     
                            ':quantity' => $quantity, 
                            ':sum' => $sum));

        
        
        
    } catch(PDOException $e) {
        error_log($e->getMessage());
        throw $e;
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
    