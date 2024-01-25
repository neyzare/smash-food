// panier.js

let panier = [];

function ajouterProduit(nom, prix) {
    panier.push({ nom: nom, prix: prix });
    afficherPanier();
}

function supprimerProduit(index) {
    panier.splice(index, 1);
    afficherPanier();
}

function afficherPanier() {
    const panierElement = document.getElementById('panier');
    panierElement.innerHTML = '';

    panier.forEach((produit, index) => {
        const ligneProduit = document.createElement('div');
        ligneProduit.innerHTML = `
            <p>${produit.nom} - ${produit.prix} $</p>
            <button onclick="supprimerProduit(${index})">Supprimer</button>
        `;
        panierElement.appendChild(ligneProduit);
    });
}
