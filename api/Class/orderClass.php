<?php 

include_once('./../Class/database.php');

class Order {
    /* properties */
    public $ID;
    public $shipperID;
    public $customerID;
    public $date;
    public $sum;
    
    function __construct($ID, $shipperID, $customerID, $date, $sum) {
        
        $this->ID = $ID;
        $this->shipperID = $shipperID;
        $this->customerID = $customerID;
        $this ->date = $date;
        $this ->sum = $sum;

    }
    public static function fromRow($row){
        return new Order(
            $row['ID'], 
            $row['shipperID'],
            $row['customerID'],
            $row['date'],
            $row['sum'],
        );
    }
}
?>