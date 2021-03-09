<?php 

class Newsletter {
    function __construct($ID, $customerID, $fName, $lName, $email) {
        
        $this->ID = $ID;
        $this->customerID = $customerID;
        $this->fName = $fName;
        $this ->lName = $lName;
        $this ->email = $email;
     
    }
    
    /* metod */
    public $ID;
    public $customerID;
    public $fName;
    public $lName;
    public $email;

}

$newsletterArray = array($ID, $customerID, $fName, $lName, $email);

?>