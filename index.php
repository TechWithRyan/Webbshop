<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro webshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/startpage.css">
    <!-- <script defer src="logic.js"></script> 
    <script defer src="index.js"></script>-->
    <script defer type="module" src="./handler.js"></script>
</head>
<body>
<header>
<div class="header">
    <div class="menu-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Retro</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav justify-content-end">
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-signpost-2-fill" style="font-size: 1,5rem;"></i> Kategorier </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-circle" style="font-size: 1,5rem;"></i> Profil </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-bag-fill" style="font-size: 1,5rem;"></i><span> 0</span> Kundkorg </a>
                  </li>
                </ul>
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
            </div>
          </nav>
    </div>
</div>
</header>
<main>

    <h1>Hello Retro Lovers</h1>

    <div class="container mt-4">
        <div class="row justify-content-center">

        <div class="col-md-4 col-12">
            <div class="card">
                <div class="img">
                <img src="template/woolsweater.png" class="card-img-top" alt="...">
            </div>
                <div class="card-body">
                <h5 class="card-title">Wool sweater</h5>
                <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-success">Lägg i varukorg</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="card">
                <div class="img">
                <img src="template/paisleyscarf.png" class="card-img-top" alt="...">
            </div>
                <div class="card-body">
                <h5 class="card-title">Paisley scarf</h5>
                <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-success">Lägg i varukorg</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="card">
                <div class="img">
                <img src="template/yellowbeanie.png" class="card-img-top" alt="...">
            </div>
                <div class="card-body">
                <h5 class="card-title">Yellow beanie</h5>
                <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-success">Lägg i varukorg</a>
                </div>
            </div>
        </div>

        

        </div>
    </div>

    <br>


</main>
<div id="allProducts"></div>
<footer>
    <div class="container">
    <div class="row align-items-end">
        <div class="col-md-4 col-12">
            <h4>Newsletter</h4>
            <input id="mail" type="email" placeholder="E-post"/>
<!--             <input id="price" type="price" placeholder="Pris"/>
            <input id="size" type="size" placeholder="Storlek"/> -->
        
            <button type="button" class="btn btn-success" onclick="getAllProducts()">Sign up</button>
            <!-- <button type="button" class="btn btn-success" onclick="deleteAllProducts()">Radera alla produkter</button>
            <button type="button" class="btn btn-success" onclick="addProduct()">Lägg till produkt</button>
         -->
        </div>
        <div class="col-md-4 col-12">
          Länkar
        </div>
        <div class="col-md-4 col-12">
          Adress
        </div>
      </div>
    </div>
    </footer>

</body>
</html>