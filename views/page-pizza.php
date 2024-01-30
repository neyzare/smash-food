<?php
session_start();
require './layaout.php';
require '../controllers/page-pizza-controller.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/page-pizza.css">
    <title>pizza</title>
</head>
<body>

<main>

    <?php foreach ($pizzas as $pizza) : ?>
        <div class="card">
            <img src="/img/<?=$pizza['image']; ?>" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $pizza['nom']; ?></h5>
                <p class="card-text"><?php echo $pizza['description']; ?></p>
                <p class="card-text">Prix : <?php echo $pizza['prix']; ?> €</p>
                <a class="btn btn-primary" onclick="ajouterAuPanier(<?php echo $burger['id']; ?>)">ajouter au panier</a>
            </div>
        </div>
    <?php endforeach; ?>

</main>

<script src="/js/panier.js"></script>
<script src="/js/index.js"></script>
</body>
</html>