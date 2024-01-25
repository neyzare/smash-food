<?php


session_start();

require_once('../connexion-bdd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Requête SQL pour récupérer l'utilisateur par son email
        $query = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe
        if ($user && password_verify($password, $user['motdepasse'])) {
            // L'utilisateur est authentifié avec succès
            $_SESSION['user_id'] = $user['id']; // Stockez l'ID de l'utilisateur en session
            header("location: ../views/homepage.php"); // Redirigez vers le tableaux de bord
            exit();
        } else {
            // Identifiants incorrects
            header("location: ../index.php"); // Redirigez vers le tableaux de bord
            exit();
        }
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}