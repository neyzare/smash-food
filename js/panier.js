const baseURL = 'http://localhost:8888/phpMyAdmin5'; // Mettez ici l'URL de votre serveur et l'endpoint de votre API

// Fonction pour récupérer les éléments du panier depuis le serveur
async function chargerPanier() {
    try {
        const response = await fetch(`${baseURL}/panier`);
        // Le reste du code reste inchangé...
    } catch (error) {
        console.error(error);
    }
}

// Fonction pour ajouter un élément au panier (côté client et serveur)
async function ajouterAuPanier(nom, prix) {
    try {
        const response = await fetch(`${baseURL}/ajouter-au-panier`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ nom: nom, prix: prix })
        });
        // Le reste du code reste inchangé...
    } catch (error) {
        console.error(error);
    }
}

// Fonction pour supprimer un élément du panier (côté client et serveur)
async function supprimerDuPanier(index) {
    try {
        const response = await fetch(`${baseURL}/supprimer-du-panier`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ index: index })
        });
        // Le reste du code reste inchangé...
    } catch (error) {
        console.error(error);
    }
}
