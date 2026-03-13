<?php
session_start();
require_once('../connexion-bdd.php');

try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $titre = htmlspecialchars($_POST['titre']);
    $message = htmlspecialchars($_POST['message']);

    $requete = $bdd->prepare("INSERT INTO contacts (titre, message) VALUES (?, ?)");
    $requete->execute([$titre, $message]);

    header("location: /views/contact.php");
    exit();
} catch (PDOException $e) {
    error_log('[smash-food] Erreur contact : ' . $e->getMessage());
    $_SESSION['flash_error'] = 'Une erreur technique est survenue. Veuillez réessayer.';
    header('location: /views/contact.php');
    exit();
}
