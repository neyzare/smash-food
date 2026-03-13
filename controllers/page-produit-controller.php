<?php
session_start();
include "../connexion-bdd.php";

if (!isset($_SESSION['user_id'])) {
    header('location: ../views/index.php');
    exit();
}

$categories = [];

try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt_categories = $bdd->prepare("SELECT id, nom FROM categories");
    $stmt_categories->execute();
    $categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $categorie = htmlspecialchars($_POST['categorie']);
        $nom       = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $prix      = htmlspecialchars($_POST['prix']);

        $target_dir  = "/img/";
        $target_file = basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file);

        $stmt_produit = $bdd->prepare(
            "INSERT INTO produits (categorie, nom, description, prix, image)
             VALUES (:categorie, :nom, :description, :prix, :image)"
        );
        $stmt_produit->bindParam(':categorie',   $categorie);
        $stmt_produit->bindParam(':nom',         $nom);
        $stmt_produit->bindParam(':description', $description);
        $stmt_produit->bindParam(':prix',        $prix);
        $stmt_produit->bindParam(':image',       $target_file);
        $stmt_produit->execute();

        header("location: ../views/ajouter-produit.php");
        exit();
    }
} catch (PDOException $e) {
    error_log('[smash-food] Erreur page-produit : ' . $e->getMessage());
    $_SESSION['flash_error'] = 'Une erreur technique est survenue. Veuillez réessayer.';
    header('location: ../views/ajouter-produit.php');
    exit();
}
?>
