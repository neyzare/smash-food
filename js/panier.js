function fetchPanier() {
    fetch('/controllers/recuperer-panier-controller.php')
        .then(r => r.json())
        .then(data => {
            const tbody = document.getElementById('panier-body');
            const totalEl = document.getElementById('panier-total');
            if (!tbody) return;
            tbody.innerHTML = '';

            if (data.success && data.panier.length > 0) {
                let total = 0;

                data.panier.forEach(produit => {
                    const prix = parseFloat(produit.prix) || 0;
                    total += prix;

                    tbody.innerHTML += `
                        <tr>
                            <td><img src="/img/${produit.image}" alt="${produit.nom}"></td>
                            <td>${produit.nom}</td>
                            <td class="prix-cell">${prix.toFixed(2)} €</td>
                            <td><button class="btn-supprimer" onclick="supprimerProduit(${produit.cart_index})">Supprimer</button></td>
                        </tr>
                    `;
                });

                if (totalEl) totalEl.textContent = total.toFixed(2).replace('.', ',') + ' €';
            } else {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="4" class="panier-empty">
                            <p>Votre panier est vide.</p>
                        </td>
                    </tr>
                `;
                if (totalEl) totalEl.textContent = '0,00 €';
            }
        })
        .catch(err => console.error(err));
}

function supprimerProduit(index) {
    fetch('/controllers/supprimer-produit.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ index })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const btn = document.getElementById('bouton-panier');
            if (btn) btn.textContent = `Panier (${data.count})`;
            fetchPanier();
        }
    })
    .catch(err => console.error(err));
}

fetchPanier();
