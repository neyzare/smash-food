<?php
session_start();
require './views/layaout.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/global.css">
  <link rel="stylesheet" href="./css/index.css">
  <title>Smash-Food</title>
</head>
<body>

<main class="hero">
  <div class="hero-intro">
    <div class="tag">🔥 Livraison rapide</div>
    <h1>Les meilleurs <em>burgers</em><br>& <em>pizzas</em> du monde</h1>
    <p>Découvrez notre sélection de burgers artisanaux et de pizzas généreuses, préparés avec des ingrédients frais.</p>
  </div>

  <div class="hero-grid">
    <div class="hero-card">
      <div class="hero-card-img-wrap">
        <img src="img/burger-homepage.jpeg" alt="Burgers">
      </div>
      <div class="hero-card-body">
        <span class="hero-card-tag">Nouveautés</span>
        <h2 class="hero-card-title">Burgers</h2>
        <p class="hero-card-text">Des smash burgers croustillants, des classiques incontournables et des créations exclusives qui feront craquer vos papilles.</p>
        <a href="./views/page-burger.php" class="hero-card-btn">Voir les burgers</a>
      </div>
    </div>

    <div class="hero-card">
      <div class="hero-card-img-wrap">
        <img src="./img/pizza.jpeg" alt="Pizzas">
      </div>
      <div class="hero-card-body">
        <span class="hero-card-tag">Populaire</span>
        <h2 class="hero-card-title">Pizzas</h2>
        <p class="hero-card-text">Pâtes fines et généreuses, garnitures de qualité et cuisson parfaite au four — nos pizzas font l'unanimité.</p>
        <a href="./views/page-pizza.php" class="hero-card-btn">Voir les pizzas</a>
      </div>
    </div>
  </div>
</main>

<script src="./js/index.js"></script>
</body>
</html>
