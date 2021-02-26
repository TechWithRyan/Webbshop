<?php 

function getAll() {
    include_once('./../Class/database.php');
    $database = new Database();

    $query = $database->connection->prepare('SELECT * FROM Product;' /* SELECT ID, name, inStock FROM product; */);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        throw new exception('No Product found', 404);
        exit;
    }
    return $result; 
}

function updateInStock($newnumber, $prodID) {
    include_once('./../Class/database.php');
    $database = new Database();

    $query = <<<EOD
    UPDATE product SET inStock = $newnumber WHERE ID = :product;
    EOD;
    $statement = $database->connection->prepare($query);
    $statement->execute(array(':produkt' => $prodID));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        throw new exception('Cannot update', 404);
        exit;
    }
    return $result; 
}

?>