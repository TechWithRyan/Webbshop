<?php 
include_once('./../Class/productClass.php'); //OOP till class


function getAll() {
    $products = Product::findAll();
    
    if (empty($products)) {
        throw new exception('No product found', 404);
        exit;
    }
    return $products; 
}


function updateInStock($newnumber, $productID) {
    $product = Product::findById($productID);
    if (empty($product)) {
        throw new exception('No product found', 404);
        exit;
    }
    $product->updateInStock($newnumber);
    return $product;
}






?>