<?php 

include_once('./../Class/database.php');

class Newsletter {
    /* properties */
    public $email;
    public $fName;
    public $lName;
    
    function __construct($email, $fName, $lName) {
        
        $this->email = $email;
        $this->fName = $fName;
        $this->lName = $lName;
    }
    public static function fromRow($row){
        return new Newsletter(
            $row['email'],
            $row['fName'],
            $row['lName'],
        );
    }

    public function create() {
        $database = new Database(); 
        $sth = $database->connection->prepare('INSERT INTO subscription (email, fName, lName)
        VALUES (:email, :fName, :lName)');
        $sth->execute(array(':email' => $this->email, ':fName' => $this->fName, ':lName' => $this->lName));
   
    }
 }

?>