<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retro</title> 
    <link rel="stylesheet" href="./style/mainStyle.css">

    <link href="https://fonts.googleapis.com/css?family=Rock+Salt&display=swap" rel="stylesheet">
    <script defer type ="module" src="./myPageHandler.js"></script>

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
   

    <div class="myPageBody">
      <h1 style="color: #333333; text-align: center;">Mina beställningar</h1>
    </div>   
    <div class="MainOrderDiv"></div>

<footer>
        
</footer>
</body>
</html>