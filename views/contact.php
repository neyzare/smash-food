<?php
session_start();
require './layaout.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/contact.css">
    <title>Contact — Smash-Food</title>
</head>
<body>

<div class="contact-wrapper">
    <div class="form-card">
        <h2>Contactez-nous</h2>
        <p class="form-subtitle">Une question ? On vous répond rapidement.</p>

        <?php if (!empty($_SESSION['flash_error'])) : ?>
            <p class="flash-error"><?= htmlspecialchars($_SESSION['flash_error']); unset($_SESSION['flash_error']); ?></p>
        <?php endif; ?>

        <form action="/controllers/contact-controller.php" method="post">
            <label for="titre">Sujet</label>
            <input type="text" id="titre" name="titre" placeholder="Votre sujet..." required>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Écrivez votre message ici..." required></textarea>

            <button type="submit">Envoyer le message</button>
        </form>
    </div>
</div>

</body>
</html>
