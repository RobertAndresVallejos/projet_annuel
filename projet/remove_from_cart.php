<?php
session_start();
$id = $_POST['id'] ?? null;

if ($id && isset($_SESSION['panier'][$id])) {
    unset($_SESSION['panier'][$id]); // Supprimer l'article du panier
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
