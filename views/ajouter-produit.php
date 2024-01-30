<?php
session_start();
include "./layaout.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/ajout-produit.css">
    <title>Ajouter un produit</title>

</head>
<body>
<main>
<form action="/controllers/page-produit-controller.php" method="post" enctype="multipart/form-data">
    <label for="categorie">Catégorie:</label>
    <select name="categorie" id="categorie">
        <option value="pizza">Pizza</option>
        <option value="burger">Burger</option>
    </select><br><br>

    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom" required><br><br>

    <label for="description">Description:</label><br>
    <textarea name="description" id="description" rows="4" cols="50"></textarea><br><br>

    <label for="prix">Prix:</label>
    <input type="number" name="prix" id="prix" step="0.01" required><br><br>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image" required><br><br>

    <input type="submit" value="Ajouter">
</form>
</main>
</body>
</html>
