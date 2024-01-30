<?php
session_start();
include "../connexion-bdd.php";

try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Vérifier si un utilisateur est connecté
if (isset($_SESSION['id_utilisateur'])) {
    // Un utilisateur est connecté, récupérer les données du panier pour cet utilisateur
    $stmt_panier = $bdd->prepare("SELECT * FROM panier WHERE id_utilisateur = :id_utilisateur");
    $stmt_panier->bindParam(':id_utilisateur', $_SESSION['id_utilisateur']);
    $stmt_panier->execute();
    $panier = $stmt_panier->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Aucun utilisateur n'est connecté, peut-être afficher un message d'erreur ou rediriger vers la page de connexion
    echo "Aucun utilisateur n'est connecté.";
}

// Retourner les données du panier au format JSON
header('Content-Type: application/json');
echo json_encode($panier);
?>
