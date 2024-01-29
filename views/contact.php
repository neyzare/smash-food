<?php
session_start();
require './layaout.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/contact.css">
    <title>Document</title>
</head>
<body>
    
   
        <form action="/controllers/contact-controller.php" method="post">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </main>
</body>
</html>