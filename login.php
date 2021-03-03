<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retro</title>
    <link rel="stylesheet" href="./style/mainStyle.css">
    <link rel="stylesheet" href="./style/loginStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Rock+Salt&display=swap" rel="stylesheet">
    <script defer type="module" src="loginHandler.js"></script>
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

    <div id="loginDiv">
        <h1>Username</h1>
        <input type="text" id="usernameInput">
        <h1>Password</h1>
        <input type="password" id="passwordInput">
        <button id="login_btn">Login</button>
    </div>

<footer class="fixed-bottom">
    <div class="container">
      <div class="row">
        <div class="col-12">
            <h3>Prenumerera på vårt nyhetsbrev</h3>
              <!-- <form class="newsletterField" id ="newsletter-form">
                <input type="text" name="firstname" id="firstname" placeholder="Förnamn">
                <input type="text" name="lastname" id="lastname" placeholder="Efternamn">
                <input type="text" name="email" id="email" placeholder="E-post">
                <button type="submit" class="btn btn-outline-success" id="newsLetterBtn">Registrera</button>
              </form> -->
              <form class="newsletterField" id ="newsletter-form">
        Prenumerera på vårt nyhetsbrev: 
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        
        <label for="firstname">Förnamn</label>
        <input type="text" name="firstname" id="firstname">
        
        <label for="lastname">Efternamn</label>
        <input type="text" name="lastname" id="lastname">
        <button type="submit" id="newsLetterBtn">Skicka</button>
    </form>
        </div>
      </div>
    </div>
   
    
    
<footer>
   
</footer>
</body>
</html>
