<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<nav>
    <a href="/index.php"><h1>Smash<span>-Food</span></h1></a>
    <ul class="navigation">
        <?php if (isset($_SESSION['user_id'])): ?>
            <?php if ($_SESSION['status'] === 'admin'): ?>
                <li class="nav-li"><a href="#" class="active nav-link">Admin</a></li>
                <li class="nav-li"><a href="/views/ajouter-produit.php" class="nav-link">Ajouter des produits</a></li>
                <li class="nav-li"><a href="/views/panier.php" id="bouton-panier" class="nav-link">Panier (<?= isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0 ?>)</a></li>
                <form class="nav-li" action="/controllers/deconnexion-controller.php" method="POST">
                    <input class="btn btn-outline-success" type="submit" value="Déconnexion">
                </form>
            <?php else: ?>
                <li class="nav-li"><a href="#" class="active nav-link"><?= htmlspecialchars($_SESSION['nom']) ?></a></li>
                <li class="nav-li"><a href="/views/contact.php" class="nav-link">Contactez-nous</a></li>
                <li class="nav-li"><a href="/views/panier.php" id="bouton-panier" class="nav-link">Panier (<?= isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0 ?>)</a></li>
                <form class="nav-li" action="/controllers/deconnexion-controller.php" method="POST">
                    <input class="btn btn-outline-success" type="submit" value="Déconnexion">
                </form>
            <?php endif; ?>
        <?php else: ?>
            <li class="nav-li"><a href="/views/inscription.php" class="nav-link">Inscription</a></li>
            <li class="nav-li"><a href="/views/connexion.php" class="nav-link">Connexion</a></li>
            <li class="nav-li"><a href="/views/contact.php" class="nav-link">Contactez-nous</a></li>
            <li class="nav-li"><a href="/views/panier.php" id="bouton-panier" class="nav-link">Panier (<?= isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0 ?>)</a></li>
        <?php endif; ?>
    </ul>
</nav>
