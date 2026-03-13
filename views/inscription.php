<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/inscription.css">
    <title>Inscription — Smash-Food</title>
</head>
<body>

<nav>
    <a href="/index.php"><h1>Smash<span>-Food</span></h1></a>
</nav>

<div class="auth-wrapper">
    <div class="form-card">
        <h2>Inscription</h2>
        <p class="form-subtitle">Créez votre compte pour commander.</p>

        <?php if (!empty($_SESSION['flash_error'])) : ?>
            <p class="flash-error"><?= htmlspecialchars($_SESSION['flash_error']); unset($_SESSION['flash_error']); ?></p>
        <?php endif; ?>

        <form action="/controllers/inscription-controller.php" method="post">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Dupont" required>

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Jean" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="votre@email.com" required>

            <label for="motdepasse">Mot de passe</label>
            <input type="password" id="motdepasse" name="motdepasse" placeholder="••••••••" required>

            <input type="submit" value="Créer mon compte">
        </form>

        <p class="form-link">
            Déjà un compte ? <a href="/views/connexion.php">Se connecter</a>
        </p>
    </div>
</div>

</body>
</html>
