<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retro</title> 
    <link rel="stylesheet" href="./style/mainStyle.css">
    <link rel="stylesheet" href="./style/cartStyle.css">
    <script src="https://kit.fontawesome.com/e8127072bf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Rock+Salt&display=swap" rel="stylesheet">
    <script defer type="module" src="cartHandler.js"></script>  
</head>
<body>
<header>
   
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
    <div class="article">
        <h1 style="color: #333333;">Kundvagn <img src="./img/CartIcon.png" style="width:20px;height:auto;text-align:right;"></h1>
    </div>
    <div id="productsInCart"></div>
    <div id="totalSum" style="text-align: center;"></div>
    <div id="goToCheckout" style="text-align: center;">
        <a href="./checkOut.php">Slutför inköp</a>
    </div>
</header>
<footer>

</footer>
</body>
</html>