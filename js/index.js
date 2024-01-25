let nombreProduitsDansPanier = 0;

function mettreAJourNombreProduits() {
    const boutonPanier = document.getElementById('boutonPanier');
    boutonPanier.textContent = `Panier (${nombreProduitsDansPanier})`;
}

function ajouterAuPanier() {
    // Simuler l'ajout d'un produit au panier
    nombreProduitsDansPanier++;

    // Mettre à jour l'affichage du nombre de produits dans le panier
    mettreAJourNombreProduits();
}

