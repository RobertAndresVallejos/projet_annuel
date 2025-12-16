<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
    <link rel="stylesheet" href="./css/panier.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <?php require_once './php/header.php'; ?>
    <main>
    <?php
// Initialisation de la session et connexion à la base de données
session_start();
require_once './php/database.php';

$sousTotal = 0;
$fraisLivraison = 5.99;

if (isset($_SESSION['role']) && $_SESSION['role'] === 'premium') {
    $fraisLivraison = 0.00;
}

echo "<div class='cart-container'>";
if (!empty($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
    echo "<h1>Mon panier (" . count($_SESSION['panier']) . " articles)</h1>";
    echo "<div class='cart-items'>";

    foreach ($_SESSION['panier'] as $id_produit => $quantite) {
        $sql = "SELECT * FROM Produit WHERE id_Produit = :id";
        $request = $pdo->prepare($sql);
        $request->bindParam(':id', $id_produit);
        $request->execute();
        $product = $request->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $totalItem = floatval($product['prix']) * intval($quantite);
            $sousTotal += $totalItem;

            echo "<div class='cart-item' data-price='{$product['prix']}'>";
            echo "<p>Marque: " . htmlspecialchars($product['marque']) . "</p>";
            echo "<p>Nom: " . htmlspecialchars($product['nom']) . "</p>";
            echo "<p>Taille: " . htmlspecialchars($product['taille']) . "</p>";
            echo "<p>Couleur: " . htmlspecialchars($product['couleur']) . "</p>";
            echo "<p>Prix: " . htmlspecialchars($product['prix']) . "€ x ";
            echo "<input type='number' name='quantite[$id_produit]' value='" . $quantite . "' min='1'>";
            echo "<button onclick='removeItemFromCart($id_produit)'>Supprimer</button>";
            echo "</div>";
        }
    }
    echo "</div>"; // fin div cart-items
    echo "<div class='cart-summary' data-delivery='{$fraisLivraison}'>";
    echo "<p>Total articles: " . number_format($sousTotal, 2) . "€</p>";
    echo "<p>Livraison: " . number_format($fraisLivraison, 2) . "€</p>";
    echo "<p>Sous total: " . number_format($sousTotal + $fraisLivraison, 2) . "€</p>";
    echo "<button>COMMANDER</button>";
    echo "</div>";
} else {
    echo "<h1>Votre panier est vide</h1>";
}
echo "</div>"; // fin div cart-container
?>

    </main>
    
    <?php require_once './php/footer.php'; ?>
    <script src="./js/script.js"></script>
</body>
</html>
