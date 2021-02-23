<?php 

function getAll() {
    include_once('./../Class/database.php');
    $database = new Database();

    $query = $database->connection->prepare('SELECT * FROM category;');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        throw new exception('No category found', 404);
        exit;
    }
    return $result; 
}

/* function getSpecific($specificCategory) {
    include_once('./../Class/database.php');
    $database = new Database();

    $query = $database->connection->prepare('SELECT * FROM categorydetails JOIN product ON categorydetails.productID = product.productID WHERE categoryID = :myCategoryID;');
    $query->execute(array(':myCategoryID' => $specificCategory));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        throw new exception('No category found', 404);
        exit;
    }
    return $result; 
} */

function getAllProducts() {
    include_once('./../Class/database.php');
    $database = new Database();

    $query = $database->connection->prepare('SELECT * FROM product;');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        throw new exception('No category found', 404);
        exit;
    }
    return $result; 
}

function getDiscount() {
    include_once('./../Class/database.php');
    $database = new Database();

    $query = $database->connection->prepare('SELECT * FROM product WHERE discount != 0;');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        throw new exception('No category found', 404);
        exit;
    }
    return $result; 
};

?>