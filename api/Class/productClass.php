<?php 

include_once('./../Class/database.php');

class Product {
    /* properties */
    public $productID;
    public $name;
    public $inStock;
    public $price;
    public $discount;
    public $title;
    public $image;
    
    function __construct($productID, $name, $inStock, $price, $discount, $title, $image) {
        
        $this->productID = $productID;
        $this->name = $name;
        $this->inStock = $inStock;
        $this ->price = $price;
        $this ->discount = $discount;
        $this ->title = $title;
        $this ->image = $image;
    }
    public static function fromRow($row)
    {
        return new Product(
            $row['productID'], 
            $row['name'],
            $row['inStock'],
            $row['price'],
            $row['discount'],
            $row['title'],
            $row['image'],
        );
    }
    
    public static function findAll() {
        $database = new Database();
        error_log("getAllProducts_OOP");

        $query = $database->connection->prepare('SELECT * FROM product;');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $products = array_map(function ($row) {
            return Product::fromRow($row);
        }, $result);
        return $products;
    }
    
    public static function findByCategoryId($specificCategory) {
        $database = new Database();
        error_log("getCategory_OOP");

        $query = $database->connection->prepare('SELECT * FROM categorydetails JOIN product ON categorydetails.productID = product.productID WHERE categoryID = :myCategoryID;');
        $query->execute(array(':myCategoryID' => $specificCategory));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $products = array_map(function ($row) {
            return Product::fromRow($row);
        }, $result);
        return $products;
    }

    public static function findDiscount(){
        $database = new Database();
        error_log("getdiscount_OOP");

        $query = $database->connection->prepare('SELECT * FROM product WHERE discount != 0;');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $products = array_map(function ($row) {
            return Product::fromRow($row);
        }, $result);
        return $products;
    }

    public static function findById($id){
        $database = new Database();

        $query = $database->connection->prepare('SELECT * FROM `product` WHERE productID = :id');
        $query->execute(array(':id' => $id));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $product = Product::fromRow($result[0]);
        return $product;
    }

    public function updateInStock($newnumber) {
        
        $database = new Database();

        $query = <<<EOD
        UPDATE product SET inStock = $newnumber WHERE productID = :product;
        EOD;
        $statement = $database->connection->prepare($query);
        $statement->execute(array(':product' => $this->productID));
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($products)) {
            throw new exception('Cannot update', 404);
            exit;
        }
              return $products;  
    }
}
?>