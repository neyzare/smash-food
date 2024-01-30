<?php
session_start();
include "../connexion-bdd.php";

if (!isset($_SESSION['user_id'])) {

    header('location: ../views/index.php');
    exit();
}


try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Récupérer les catégories depuis la base de données
$stmt_categories = $bdd->prepare("SELECT id, nom FROM categories");
$stmt_categories->execute();
$categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

// Traitement du formulaire d'ajout de produit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categorie = htmlspecialchars($_POST['categorie']);
    $nom = htmlspecialchars($_POST['nom']);
    $description = htmlspecialchars($_POST['description']);
    $prix = htmlspecialchars($_POST['prix']);

    // Upload de l'image
    $target_dir = "/img/";
    $target_file =  basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file);

    // Requête préparée pour insérer le produit dans la base de données
    $stmt_produit = $bdd->prepare("INSERT INTO produits (categorie, nom, description, prix, image) 
                                    VALUES (:categorie, :nom, :description, :prix, :image)");
    $stmt_produit->bindParam(':categorie', $categorie);
    $stmt_produit->bindParam(':nom', $nom);
    $stmt_produit->bindParam(':description', $description);
    $stmt_produit->bindParam(':prix', $prix);
    $stmt_produit->bindParam(':image', $target_file);

    try {
        $stmt_produit->execute();
        header("location: ../views/ajouter-produit.php");
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout du produit: " . $e->getMessage();
    }
}
?>