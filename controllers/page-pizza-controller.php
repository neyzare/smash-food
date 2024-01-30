<?php
session_start();
require "../connexion-bdd.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);
try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour sélectionner les produits de catégorie burger
    $stmt = $bdd->prepare("SELECT * FROM produits WHERE categorie = 'pizza'");
    $stmt->execute();
    $pizzas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "error : " . $e->getMessage();
}
