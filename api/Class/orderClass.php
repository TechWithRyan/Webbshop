<?php 

class Order {
    function __construct($ID, $shipperID, $customerID, $date, $sum) {
        
        $this->ID = $ID;
        $this->shipperID = $shipperID;
        $this->customerID = $customerID;
        $this ->date = $date;
        $this ->sum = $sum;
     
    }
    
    /* metod */
    public $ID;
    public $shipperID;
    public $customerID;
    public $date;
    public $sum;

}


?>