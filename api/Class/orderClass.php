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

    public function create(){
        $database = new Database();
        $datum = $this->date;
        
        try {
            $sql_array = array(':customerID' => $this->customerID, 
            ':shipperID' => $this->shipperID,
            ':datum' => $datum, 
            ':sum' => $this->sum);
            $database->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $qry = $database->connection->prepare('INSERT INTO `order` (customerID, shipperID, `date`, `sum`)
             VALUES (:customerID, :shipperID, :datum, :sum);');
            $qry->execute(array(':customerID' => $this->customerID, 
                                ':shipperID' => $this->shipperID,     
                                ':datum' => $datum, 
                                ':sum' => $this->sum));
                                $id = $database->connection->lastInsertId();
                                $this->ID = $id;
                                return $id;
                                //$result = $query->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e) {
            error_log($e->getMessage());
            throw $e;
        }
    
    }

    public function createDetail($detail){
        $database = new Database();
    
        try {
    
            $database->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $qry = $database->connection->prepare('INSERT INTO orderDetails (orderID, productID, quantity, sum) 
                                    VALUES (:purchaseID, :productID, :quantity, :sum); 
                                    UPDATE product
                                    SET inStock = ifNull(inStock,0) - :quantity
                                    WHERE productID = :productID');

            $qry->execute(array(':purchaseID' => $this->ID, 
                                ':productID' => $detail['productID'],     
                                ':quantity' => $detail['quantity'], 
                                ':sum' => $detail['sum']));
    
        } catch(PDOException $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }
 public function findByCustomerId($customerID){

 }
}
?>