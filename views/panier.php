<?php
session_start();
require './layaout.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/panier.css">
    <title>Mon Panier — Smash-Food</title>
</head>
<body>

<div class="panier-page">
    <h2>Mon <span>Panier</span></h2>

    <div class="table-wrapper">
        <table id="panier">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="panier-body">
                <!-- Contenu du panier inséré dynamiquement -->
            </tbody>
        </table>
    </div>

    <div class="panier-footer">
        <div class="panier-total">
            <span>Total :</span>
            <strong id="panier-total">0,00 €</strong>
        </div>
    </div>
</div>

<script src="/js/panier.js"></script>

</body>
</html>
