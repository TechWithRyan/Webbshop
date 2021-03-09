<?php 

class Categorydetails {
    function __construct($productID, $categoryID) {
        
        $this->productID = $productID;
        $this->categoryID = $categoryID;
     
    }
    
    /* metod */
    public $productID;
    public $categoryID;
   

}

$categoryDetailArray = array($productID, $categoryID);

?>