<?php 
class customer {
    public $fName;
    public $lName;
    public $email;
    public $phone;
    public $city;
    public $postalcode;
    public $country;
    public $street;

    function __construct($fName, $lName, $email, $phone, $city, $postalcode, $country, $street)
    {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->phone = $phone;
        $this->city = $city;
        $this->postalcode = $postalcode;
        $this->country = $country;
        $this->street = $street;
    }

};

$userArray = array($fName, $lName, $email, $phone, $city, $postalcode, $country, $street);
 

?>