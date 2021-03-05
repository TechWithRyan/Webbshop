<?php
session_start();
try {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(isset($_POST['endpoint']) && $_POST['endpoint'] == 'add') {   // login

            include('./../Handlers/userHandler.php');
            $result = getAll();
            echo json_encode($result); 
            //ny eller samma?
        } else if(isset($_POST['endpoint']) && $_POST['endpoint'] == 'addNew') {    // registration new user
            
            if (
                isset($_POST["fName"]) && 
                isset($_POST["lName"]) &&
                isset($_POST["email"]) &&
                isset($_POST["phone"]) &&
                isset($_POST["password"]) &&
                isset($_POST["city"]) &&
                isset($_POST["postalcode"]) &&
                isset($_POST["country"]) &&
                isset($_POST["street"])) {
                    include('./../Handlers/userHandler.php');
                    //include('./../Class/userClass.php');

                    //$customer = new customer($fName, $lName, $email, $street, $city, $postalcode, $country, $phone);

                    $result = registerNewUser(
                        $_POST["fName"],
                        $_POST["lName"],
                        $_POST["email"],
                        $_POST["phone"],
                        $_POST["password"],
                        $_POST["city"],
                        $_POST["postalcode"],
                        $_POST["country"],
                        $_POST["street"]
                    );

                    echo json_encode($result); 
                    echo ($result);
            }


        } else {
            throw new Exception('Not a valid endpoint', 501);
        }


    } else if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if($_GET['endpoint'] == 'getAll') {

            include('./../Handlers/userHandler.php');
            $result = getAll();
            echo json_encode($result); 

        } else if ($_GET['endpoint'] == 'getSpecific'){
            include('./../Handlers/userHandler.php');
            $result = getSpecific($_GET['username'] , $_GET['password']);
            echo json_encode($result);

        }else if ($_GET['endpoint'] == 'login'){
            include('./../Handlers/userHandler.php');
            $result = login($_GET['username'] , $_GET['password']);
            $_SESSION["loggedinUser"] = serialize($result);
            echo json_encode($result);
        
        } else if ($_GET['endpoint'] == 'logout'){
            session_destroy();

        }else if ($_GET['endpoint'] == 'getLoggedinUser'){
            
            if (isset($_SESSION['loggedinUser'])){
                $result = unserialize($_SESSION['loggedinUser']) ;
                echo json_encode($result);
            }else{
                echo json_encode(false);
            }
            

        }   else {
            throw new Exception('Not a valid endpoint', 501);
        }

    } else {
        throw new Exception('Not a valid request method', 405);
    }

} catch(Exception $e) {
    echo json_encode(array('Message' => $e->getMessage(), 'status' => $e->getCode()));
}

?>