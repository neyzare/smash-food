<?php
session_start();
require_once('../connexion-bdd.php');

try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $motdepasse = password_hash(htmlspecialchars($_POST['motdepasse']), PASSWORD_DEFAULT);

    $stmt = $bdd->prepare('INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :motdepasse)');
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':motdepasse', $motdepasse);
    $stmt->execute();

    header("location: ../index.php");
    exit();
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
