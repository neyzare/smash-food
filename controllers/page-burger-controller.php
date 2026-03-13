<?php
require "../connexion-bdd.php";

$burgers = [];

try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $bdd->prepare("SELECT * FROM produits WHERE categorie = 'burger'");
    $stmt->execute();
    $burgers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log('[smash-food] Erreur chargement burgers : ' . $e->getMessage());
}
