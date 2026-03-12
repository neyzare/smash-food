<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/connexion.css">
    <title>Connexion — Smash-Food</title>
</head>
<body>

<nav>
    <a href="/index.php"><h1>Smash<span>-Food</span></h1></a>
</nav>

<div class="auth-wrapper">
    <div class="form-card">
        <h2>Connexion</h2>
        <p class="form-subtitle">Ravi de vous revoir ! Entrez vos identifiants.</p>

        <form action="/controllers/connexion-controller.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="votre@email.com" required>

            <label for="motdepasse">Mot de passe</label>
            <input type="password" id="motdepasse" name="motdepasse" placeholder="••••••••" required>

            <input type="submit" value="Se connecter">
        </form>

        <p class="form-link">
            Pas encore de compte ? <a href="/views/inscription.php">S'inscrire</a>
        </p>
    </div>
</div>

</body>
</html>
