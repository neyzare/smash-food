<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "nom_de_votre_base_de_donnees";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurer le mode d'erreur de PDO pour lancer des exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour sélectionner les produits de catégorie burger
    $stmt = $conn->prepare("SELECT * FROM produits WHERE categorie = 'burger'");
    $stmt->execute();
    $burgers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burgers</title>
</head>
<body>
<h2>Nos Burgers</h2>
<div class="produits">
    <?php foreach ($burgers as $burger) : ?>
        <div class="produit">
            <h3><?php echo $burger['nom']; ?></h3>
            <p><?php echo $burger['description']; ?></p>
            <p>Prix : <?php echo $burger['prix']; ?> €</p>
            <img src="<?php echo $burger['image']; ?>" alt="<?php echo $burger['nom']; ?>">
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
