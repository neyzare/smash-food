function ajouterAuPanier(productId, btn) {
    if (btn) {
        btn.disabled = true;
        btn.textContent = 'Ajouté ✓';
    }

    fetch('/controllers/ajouter-panier-controller.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ productId })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const navBtn = document.getElementById('bouton-panier');
            if (navBtn) navBtn.textContent = 'Panier (' + data.count + ')';
            setTimeout(() => {
                if (btn) {
                    btn.disabled = false;
                    btn.textContent = 'Ajouter au panier';
                }
            }, 1500);
        } else {
            if (btn) {
                btn.disabled = false;
                btn.textContent = 'Ajouter au panier';
            }
        }
    })
    .catch(err => {
        console.error(err);
        if (btn) {
            btn.disabled = false;
            btn.textContent = 'Ajouter au panier';
        }
    });
}
