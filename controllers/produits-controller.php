<?php


class ProduitBurger {

    public $pain = 120;
    public $salade = 1;
    public $cornichon = 30;
    public $tomate = 10;
    public $steak = 150;
    public $cheddar = 200;
    public $ketchup = 110;
    public $moutarde = 110;
    
    // Méthode pour ajuster les valeurs en fonction de la quantité
    public function ajusterQuantite($quantite)
    {
        // Vérifier si la quantité est un nombre positif
        if (is_numeric($quantite) && $quantite > 0) {
            $this->pain *= $quantite;
            $this->salade *= $quantite;
            $this->cornichon *= $quantite;
            $this->tomate *= $quantite;
            $this->steak *= $quantite;
            $this->cheddar *= $quantite;
            $this->ketchup *= $quantite;
            $this->moutarde *= $quantite;
        } else {
            // Gérer les cas d'erreur ou ignorer si nécessaire
            // Pour cet exemple, nous ne faisons rien
        }
    }
    
    // Méthode magique __toString pour afficher la valeur de la propriété "pain"
    public function __toString()
    {
        return "$this->pain Kcal";
    }
    }
    
    // Exemple d'utilisation
    $nouveauBurger = new ProduitBurger();
    $nouveauBurger->ajusterQuantite(2); // Ajuste les valeurs pour représenter deux burgers
    
    // Vous pouvez maintenant accéder aux valeurs actualisées
    echo $nouveauBurger->pain; // Affiche la nouvelle valeur de "pain" après ajustement
    