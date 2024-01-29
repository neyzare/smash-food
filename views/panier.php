<?php
session_start();
require './layaout.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/panier.css">
    <title>Document</title>
</head>
<body>
<main>
<table id="panier">
    <thead>
    <tr>
        <th>Image</th>
        <th>Nom du Burger</th>
        <th>Prix</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody id="panier-body">
    <!-- Contenu du panier -->
    </tbody>
</table>
</main>
</body>
</html>