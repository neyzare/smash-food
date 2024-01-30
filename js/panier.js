// panier.js

// Fonction pour récupérer les données du panier depuis le serveur
function fetchPanier() {
    fetch('/recuperer-panier-controller.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Efface le contenu actuel du panier
                document.getElementById('panier-body').innerHTML = '';
                // Ajoute chaque produit du panier dans le tableau
                data.panier.forEach(produit => {
                    const row = `
                        <tr>
                            <td><img src="/img/${produit.image}" alt="Image du produit" class="card-img-top"></td>
                            <td>${produit.nom}</td>
                            <td>${produit.prix}</td>
                            <td><button onclick="supprimerProduit(${produit.id})">Supprimer</button></td>
                        </tr>
                    `;
                    document.getElementById('panier-body').innerHTML += row;
                });
            } else {
                console.error('Erreur lors de la récupération du panier :', data.message);
            }
        })
        .catch(error => console.error('Erreur lors de la récupération du panier :', error));
}

// Fonction pour supprimer un produit du panier
function supprimerProduit(idProduit) {
    fetch('/supprimer-produit.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: idProduit })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchPanier(); // Rafraîchit le panier après la suppression
            } else {
                console.error('Erreur lors de la suppression du produit :', data.message);
            }
        })
        .catch(error => console.error('Erreur lors de la suppression du produit :', error));
}

// Appeler la fonction fetchPanier pour afficher le panier au chargement de la page
fetchPanier();
