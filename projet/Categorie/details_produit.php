<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du produit</title>
    <link rel="stylesheet" href="../css/styledetail.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>
    <?php require_once '../php/header.php'; ?>
    <main>
        <div class="product-details-container">
            <?php
                require_once '../php/database.php';
                $id_produit = $_GET['id'];
                $sql = "SELECT * FROM Produit WHERE id_Produit = :id";
                $request = $pdo->prepare($sql);
                $request->bindParam(':id', $id_produit);
                $request->execute();
                $product = $request->fetch(PDO::FETCH_ASSOC);

                if ($product) {
                    echo "<div class='product-details'>";
                    echo "<h1>" . htmlspecialchars($product['nom']) . "</h1>";
                    echo "<p>" . htmlspecialchars($product['description']) . "</p>";
                    echo "<p>Prix : " . htmlspecialchars($product['prix']) . "€</p>";
                    echo "<form action='ajouter_panier.php' method='post'>";
                    echo "<input type='hidden' name='id_produit' value='" . $product['id_Produit'] . "'>";
                    echo "<input type='submit' value='Ajouter au panier'>";
                    echo "</form>";
                    echo "</div>";
                }
                 else {
                    echo "Produit non trouvé.";
                }
            ?>
        </div>
    </main>
    <?php require_once '../php/footer.php'; ?>
    <script src="../js/script.js"></script>
</body>
</html>
