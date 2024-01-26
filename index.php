<?php
session_start();
require './views/layaout.php';
?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/index.css">
  <title>Smash-Food</title>

</head>
<body>


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
