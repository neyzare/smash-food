 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/index.css">
  <title>Smash-Food</title>

</head>
<body>
<nav >
        <h1>Smash-Food</h1>
        <ul class="navigation">
          <li class="nav-li"><a href="./views/inscription.php" class="active nav-link">Inscription</a></li>
          <li class="nav-li"><a href="./views/connexion.php" class="nav-link">Connection</a></li>
          <li class="nav-li"><a href="./views/contact.php" class="nav-link">Contactez-nous</a></li>
          <li class="nav-li"><a href=""  id="bouton-panier" class="nav-link" onclick="afficherPanier()">Panier (0)</a>
        </ul>
        <div class="btns">
            <a href="#" class="inscription"></a>
        </div>
    </nav>


<main>
  <div class="span-title">Bienvenue sur Smash-Food le premier Site de de burger et de pizza du monde !</div>
    <section class="section1">
      <div class="card">
        <img src="img/burger-homepage.jpeg" alt="" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Burger </h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="./views/page-burger.php" class="btn btn-primary">Voir tout nos produits</a>
        </div>
      </div>
    </section>

    <section class="section2">
      <div class="card">
        <img src="./img/pizza.jpeg" alt="" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Pizza</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="./views/page-pizza.php" class="btn btn-primary">Voir tout nos produits</a>
        </div>
      </div>
    </section>
  
</main>

<script src="./js/index.js"></script>
</body>
</html>
