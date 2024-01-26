<?php session_start()?>

<nav>
    <a href="/index.php"><h1>Smash-Food</h1></a>
    <ul class="navigation">
        <?php if(isset($_SESSION['user_id'])): ?>
            <?php if($_SESSION['status'] === 'admin'): ?>
                <li class="nav-li"><a href="#" class="active nav-link">Admin</a></li>
                <li class="nav-li"><a href="#" class="nav-link">Ajouter des produits</a></li>
                <li class="nav-li"><a href="#" class="nav-link">Deconnexion</a></li>
            <?php else: ?>
                <li class="nav-li"><a href="#" class="active nav-link"><?php echo $_SESSION['prenom']; ?></a></li>
                <li class="nav-li"><a href="#" class="nav-link">Contactez-nous</a></li>
                <li class="nav-li"><a href="#" class="nav-link">Deconnexion</a></li>
            <?php endif; ?>
        <?php else: ?>
            <li class="nav-li"><a href="/views/inscription.php" class="active nav-link">Inscription</a></li>
            <li class="nav-li"><a href="/views/connexion.php" class="nav-link">Connection</a></li>
            <li class="nav-li"><a href="/views/contact.php" class="nav-link">Contactez-nous</a></li>
        <?php endif; ?>
        <li class="nav-li"><a href="#"  id="bouton-panier" class="nav-link" onclick="afficherPanier()">Panier (0)</a></li>
    </ul>
    <div class="btns">
        <a href="#" class="inscription"></a>
    </div>
</nav>
