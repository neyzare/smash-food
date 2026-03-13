<?php
session_start();
require "../connexion-bdd.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['motdepasse']);

        $query = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['status'] = 'user';
            header("location: /index.php");
            exit();
        }

        $admin_query = $bdd->prepare("SELECT * FROM administrateurs WHERE email = ?");
        $admin_query->execute([$email]);
        $admin = $admin_query->fetch(PDO::FETCH_ASSOC);

        if ($admin && $password === $admin['mot_de_passe']) {
            $_SESSION['user_id'] = $admin['id'];
            $_SESSION['nom'] = $admin['nom'];
            $_SESSION['status'] = 'admin';
            header("location: /index.php");
            exit();
        }

        header("location: /views/connexion.php");
        exit();

    } catch (PDOException $e) {
        error_log('[smash-food] Erreur connexion BDD : ' . $e->getMessage());
        $_SESSION['flash_error'] = 'Une erreur technique est survenue. Veuillez réessayer.';
        header('location: /views/connexion.php');
        exit();
    }
}
