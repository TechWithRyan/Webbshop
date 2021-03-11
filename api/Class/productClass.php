<?php 

class Product {
    function __construct($ID, $name, $inStock, $price, $discount, $title, $image) {
        
        $this->ID = $ID;
        $this->name = $name;
        $this->inStock = $inStock;
        $this ->price = $price;
        $this ->discount = $discount;
        $this ->title = $title;
        $this ->image = $image;
    }
    
    /* metod */
    public $ID;
    public $name;
    public $inStock;
    public $price;
    public $discount;
    public $title;
    public $image;
}


?>