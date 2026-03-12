<?php
session_start();
require './layaout.php';
require '../controllers/page-burger-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/page-burger.css">
    <title>Burgers — Smash-Food</title>
</head>
<body>

<div class="product-page">
    <div class="page-header">
        <span class="tag">Notre carte</span>
        <h2>Nos Burgers</h2>
        <p>Des smash burgers croustillants préparés avec des ingrédients frais</p>
    </div>

    <div class="products-grid">
        <?php foreach ($burgers as $burger) : ?>
            <div class="card">
                <img src="/img/<?= $burger['image']; ?>" alt="<?= htmlspecialchars($burger['nom']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($burger['nom']); ?></h5>
                    <p class="card-text"><?= htmlspecialchars($burger['description']); ?></p>
                    <p class="card-price"><?= $burger['prix']; ?> €</p>
                    <button class="btn btn-primary" onclick="ajouterAuPanier(<?= $burger['id']; ?>, this)">Ajouter au panier</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="/js/index.js"></script>
</body>
</html>
