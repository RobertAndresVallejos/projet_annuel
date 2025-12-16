<?php
session_start(); // Démarre la gestion de session

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = []; // Initialise le panier si ce n'est pas déjà fait
}

$id_produit = $_POST['id_produit'] ?? null; // Récupère l'ID du produit à ajouter

if ($id_produit) {
    if (!isset($_SESSION['panier'][$id_produit])) {
        $_SESSION['panier'][$id_produit] = 1; // Ajoute le produit avec une quantité de 1 si non présent
    } else {
        $_SESSION['panier'][$id_produit]++; // Incrémente la quantité si déjà présent
    }
}

header('Location: ../panier.php'); // Redirige l'utilisateur vers la page du panier
exit;
?>
