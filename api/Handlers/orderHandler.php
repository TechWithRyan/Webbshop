<?php 
function getAllProcutsInStock (){
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
}



function getAllFromUser($user) {
    error_log($user);
    include_once('./../Class/database.php');
    $database = new Database();

    $query = <<<EOD
    SELECT *
    FROM `order` AS o 
    INNER JOIN orderdetails AS pd
    ON o.ID = pd.orderID 
    INNER JOIN product as p 
    ON pd.productID = p.ID
    WHERE o.customerID = :user;
    EOD;
    error_log($user);
    $statement = $database->connection->prepare($query);
    $statement->bindParam(':user', $user, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        throw new exception('No order found', 404);
        exit;
    }
    return $result; 
}
function createPurchase($userID, $shipperID, $date, $sum){
    // include_once('./../Class/userClass.php');
    include_once('./../Class/database.php');
    $database = new Database();
    $datum = $date;
    

    try {

        $database->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $qry = $database->connection->prepare('INSERT INTO purchase (userID, shipperID, `date`, `sum`)
         VALUES (:userID, :shipperID, :datum, :sum);');

        $qry->execute(array(':userID' => $userID, 
                            ':shipperID' => $shipperID,     
                            ':datum' => $datum, 
                            ':sum' => $sum));

                            $id = $database->connection->lastInsertId();
                            return $id;
        
                           /*  $result = $query->fetch(PDO::FETCH_ASSOC); */
        
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
    SELECT o.purchaseID, o.date,o.sum, pd.quantity, pd.sum, p.name, p.price
    FROM purchase AS o 
    INNER JOIN purchasedetails AS pd
    ON o.purchaseID = pd.purchaseID 
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
    