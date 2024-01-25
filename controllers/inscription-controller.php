<?php
session_start();

require_once('../connexion-bdd.php');

try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ... le reste de votre code ...
     // Données à insérer (vous pouvez les récupérer depuis un formulaire, par exemple)
     $nom = htmlspecialchars($_POST['nom']);
     $prenom = htmlspecialchars($_POST['prenom']);
     $nom_utilisateur = htmlspecialchars($_POST['nomutilisateur']);
     $email = htmlspecialchars($_POST['email']);
     $motdepasse = password_hash(htmlspecialchars($_POST['motdepasse']), PASSWORD_DEFAULT);
     

     $sql = 'INSERT INTO utilisateurs (nom, prenom, nom_utilisateur, email, mot_de_passe) VALUES (:nom, :prenom, :nom_utilisateur, :email, :motdepasse)';
     $stmt = $bdd->prepare($sql);
 
     // Bind parameters
     $stmt->bindParam(':nom', $nom);
     $stmt->bindParam(':prenom', $prenom);
     $stmt->bindParam(':nom_utilisateur', $nom_utilisateur);
     $stmt->bindParam(':email', $email);
     $stmt->bindParam(':motdepasse', $motdepasse);
 
     // Execute the statement
     $stmt->execute();
     header("location: ../index.php");
     exit();
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

?>