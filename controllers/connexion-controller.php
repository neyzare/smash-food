<?php
session_start();

require "../connexion-bdd.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['motdepasse']);

        // Requête SQL pour récupérer l'utilisateur par son email
        $query = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe pour les utilisateurs
            if (password_verify($password, $user['mot_de_passe'])) {
                // L'utilisateur est authentifié avec succès
                $_SESSION['user_id'] = $user['id'];  // Stockez l'ID de l'utilisateur en session
                $_SESSION['nom'] = $user['nom'];
                $_SESSION["status"] = 'user';
                header("location: /index.php"); // Redirigez vers le tableau de bord
                exit();
            } else {
                // Mot de passe incorrect pour l'utilisateur
                header("location: /views/connexion.php"); // Redirigez vers le formulaire de connexion
                exit();
            }
        }

        // Requête SQL pour vérifier si l'utilisateur est un administrateur
        $admin_query = $bdd->prepare("SELECT * FROM administrateurs WHERE email = ?");
        $admin_query->execute([$email]);
        $admin = $admin_query->fetch(PDO::FETCH_ASSOC);

        if ($admin && $password === $admin['mot_de_passe']) {
            // L'administrateur est authentifié avec succès
            $_SESSION['user_id'] = $admin['id'];  // Stockez l'ID de l'administrateur en session
            $_SESSION['nom'] = $admin['nom'];
            $_SESSION["status"] = 'admin';
            header("location: /index.php"); // Redirigez vers le tableau de bord
            exit();
        } else {
            // Mot de passe incorrect pour l'administrateur
            header("location: /views/connexion.php"); // Redirigez vers le formulaire de connexion
            exit();
        }
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>
