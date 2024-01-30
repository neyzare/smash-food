<?php


session_start();
include "../connexion-bdd.php";


// Récupérez l'ID du produit à ajouter au panier depuis la requête POST
$productId = $_POST['productId'];

// Ajoutez le produit au panier dans la base de données (vous devez implémenter cette fonctionnalité)
// Vous pouvez utiliser PDO ou une autre méthode pour insérer le produit dans la table panier

// Retournez un message de succès si le produit a été ajouté au panier avec succès
echo json_encode(['success' => true]);
