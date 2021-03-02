<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Route 66 webshop</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/startpage.css">

    <link href="https://fonts.googleapis.com/css?family=Rock+Salt&display=swap" rel="stylesheet">
    <script defer type="module" src="cartHandler.js"></script>  
</head>
<body>
<header>
<div class="header">
    <div class="menu-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Route 66</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.html"> Om oss <i class="bi bi-question-circle" style="font-size: 1.5rem;"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="myPage.php"> Profil <i class="bi bi-person" style="font-size: 1.5rem;"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="cart.php"> Kundkorg <i class="bi bi-bag" style="font-size: 1.5rem;"></i> <span id="numberOfItemsInCart"></span></a>
                  </li>
                </ul>
          </nav>
    </div>
</div>
</header>

<main class="container">
<div class="mt-4 heading">
    <h1>Kundkorg <i class="bi bi-bag" style="font-size: 1.5rem;"></i></h1> 
</div>
    <div class="col">
    
        <div id="productsInCart"></div>
        <div id="totalSum" style="text-align: center;"></div>
        <a id="goToCheckout" href="./checkOut.php" class="btn btn-outline-success">Slutför köp</a>
    
</div>
</main>

<footer class="fixed-bottom">
    <div class="container">
      <div class="row">
        <div class="col-12">
            <h3>Prenumerera på vårt nyhetsbrev</h3>
              <form class="newsletterField" id ="newsletter-form">
                <input type="text" name="firstname" id="firstname" placeholder="Förnamn">
                <input type="text" name="lastname" id="lastname" placeholder="Efternamn">
                <input type="text" name="email" id="email" placeholder="E-post">
                <button type="submit" class="btn btn-outline-success" id="newsLetterBtn">Registrera</button>
              </form>
        </div>
      </div>
    </div>
</footer>

</body>
</html>