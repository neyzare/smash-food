<?php
session_start();
require './layaout.php';
require '../controllers/page-burger-controller.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/page-burger.css">
    <title>Burgers</title>
</head>
<body>

<main>

        <?php foreach ($burgers as $burger) : ?>
            <div class="card">
                <img src="/img/<?=$burger['image']; ?>" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $burger['nom']; ?></h5>
                    <p class="card-text"><?php echo $burger['description']; ?></p>
                    <p class="card-text">Prix : <?php echo $burger['prix']; ?> €</p>
                    <a class="btn btn-primary" onclick="afficherPanier()">ajouter au panier</a>
                </div>
            </div>
        <?php endforeach; ?>

</main>

<script src="/js/panier.js"></script>
<script src="/js/index.js"></script>
</body>
</html>