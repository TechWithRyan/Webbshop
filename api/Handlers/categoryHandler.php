<?php 
include_once('./../Class/productClass.php'); //OOP till class

function getSpecific($specificCategory) {
    $products = Product::findByCategoryId($specificCategory);
    if (empty($products)) {
        throw new exception('No category found', 404);
        exit;
    }
    return $products;
}

function getAllProducts() {
    $products = Product::findAll();
    
    if (empty($products)) {
        throw new exception('No products found', 404);
        exit;
    }
    return $products; 
}

function getDiscount() {
    $products = Product::findDiscount();

        if (empty($products)) {
        throw new exception('No category found', 404);
        exit;
    }
    return $products; 
};

?>