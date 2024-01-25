<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/page-burger.css">
    <title>Document</title>
</head>
<body>
<nav >
        <a href="/index.php"><h1>Smash-Food</h1></a>
        <ul class="navigation">
          <li class="nav-li"><a href="#" class="active nav-link">Inscription</a></li>
          <li class="nav-li"><a href="#" class="nav-link">Connection</a></li>
          <li class="nav-li"><a href="#" class="nav-link">Contactez-nous</a></li>
          <li class="nav-li"><a href="#"  id="bouton-panier" class="nav-link" onclick="afficherPanier()">Panier (0)</a>
        </ul>
        <div class="btns">
            <a href="#" class="inscription"></a>
        </div>
    </nav>
    

<main>
    <section class="section1">
      <div class="card">
        <img src="/img/pizza-reine.jpg" alt="" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">pizza-reine</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ab et sit magnam iusto quae commodi ullam ipsa! Veniam, architecto?<br><br>
            Composition <br><br>
            ingredient : </p>
          <a href="./views/page-burger.php" class="btn btn-primary">ajouter au panier</a>
        </div>
      </div>
    </section>

    <section class="section2">
      <div class="card">
        <img src="/img/pizza-chorizo.jpg" alt="" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">pizza-chorizette</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ab et sit magnam iusto quae commodi ullam ipsa! Veniam, architecto?<br><br>
            Composition <br><br>
            ingredient : </p>
          <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
    </section>

    <section class="section3">
      <div class="card">
        <img src="/img/smash-pizza.jpeg" alt="" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Smash-pizzouz</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ab et sit magnam iusto quae commodi ullam ipsa! Veniam, architecto?<br><br>
            Composition <br><br>
            ingredient : </p>
          <a href="#" class="btn btn-primary">ajouter au panier</a>
        </div>
      </div>
    </section>
  
</main>


</html>