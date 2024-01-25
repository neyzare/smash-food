<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/connexion.css">
    <title>Document</title>
</head>
<body>
<nav>
<a href="/index.php"><h1>Smash-Food</h1></a>
    </nav>

    <form action="/controllers/connexion-controller.php" method="post">
        <h2>Connection</h2>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="motdepasse">Mot de passe</label>
            <input type="password" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required>

            <input type="submit" value="S'inscrire">
        </form>
</body>
</html>