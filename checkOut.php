<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retro</title> 
    <link rel="stylesheet" href="./style/mainStyle.css">
    <link rel="stylesheet" href="./style/checkOutStyle.css">
    <link rel="stylesheet" href="./style/shipperStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Rock+Salt&display=swap" rel="stylesheet">    
    <script defer type ="module" src="./checkOutHandler.js"></script>
    <script defer type ="module" src="./shippersHandler.js"></script>
</head>
<body>
<header>
    <div class="headTitle">
        <a href="index.php"><h1 class="textTitle">Retro</h1></a>
    </div>
</header>
    

<nav> 
    <div class="loginCartWrap">
    <div class="loginText">
        <a href="login.php">Inloggning</a>
    </div>
    <div class="myPageText">
        <a href="myPage.php">Mina sidor</a>
    </div>
    <div class="cartField">
    <div id="numberOfItemsInCart"></div>
        <a href="cart.php"><img src="./img/CartIcon.png" style="width:20px;height:auto;text-align:right;"></a>
    </div>
    </div>
</nav>   
    <div class="categoryTitle">
        <h2>Slutför köp</h2>
    </div>
    <div class="checkOutForm">                     
    <div id="checkoutField" id="userData">
        <h1>Förnamn</h1>
        <input type="text" id="fName">
        <h1>Efternamn</h1>
        <input type="text" id="lName">
        <h1>Adress</h1>
        <input type="text" id="street">
        <h1>Stad</h1>
        <input type="text" id="city">
        <h1>Postnummer</h1>
        <input type="text" id="postalcode">
        <h1>Land</h1>
        <input type="text" id="country">
        <h1>Telefonnummer</h1>
        <input type="text" id="phone">
        <!-- <h1>Username</h1>
        <input type="text" id="usernameInput">
        <h1>Password</h1>
        <input type="password" id="passwordInput">  -->   
    </div>    
        <h3 style="text-align:center">Välj din fraktaltmethod:</h3>
        
    <div id="shippers">
        <button id="getShippers">Klicka här för att välja</button>
    </div>
        <button id="checkoutSubmit">Betalningen</button>
    </div>
    <footer>
    <br> <br>
    <form class="newsletterField" id ="newsletter-form">
    Please sign up for our newsletters
    <br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    
    <label for="firstname">Förnamn</label>
    <input type="text" name="firstname" id="firstname">
    
    <label for="lastname">Efternamn</label>
    <input type="text" name="lastname" id="lastname">
    <button type="submit" id="newsLetterBtn">Skicka</button>
    </form>
    <br> 
</footer>
</body>
</html>
