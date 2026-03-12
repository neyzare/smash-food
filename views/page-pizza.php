<?php
session_start();
require './layaout.php';
require '../controllers/page-pizza-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/page-pizza.css">
    <title>Pizzas — Smash-Food</title>
</head>
<body>

<div class="product-page">
    <div class="page-header">
        <span class="tag">Notre carte</span>
        <h2>Nos Pizzas</h2>
        <p>Des pizzas généreuses cuites au four avec des ingrédients de qualité</p>
    </div>

    <div class="products-grid">
        <?php foreach ($pizzas as $pizza) : ?>
            <div class="card">
                <img src="/img/<?= $pizza['image']; ?>" alt="<?= htmlspecialchars($pizza['nom']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($pizza['nom']); ?></h5>
                    <p class="card-text"><?= htmlspecialchars($pizza['description']); ?></p>
                    <p class="card-price"><?= $pizza['prix']; ?> €</p>
                    <button class="btn btn-primary" onclick="ajouterAuPanier(<?= $pizza['id']; ?>, this)">Ajouter au panier</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="/js/index.js"></script>
</body>
</html>
