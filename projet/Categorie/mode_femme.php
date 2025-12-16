<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche de Vêtements</title>
    <link rel="stylesheet" href="../css/stylemode.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/stylefilter.css">
</head>
<body>

<?php require_once '../php/header.php'; ?>

<?php require_once 'filtre.php'; ?>



<main>
    <div class="produit">
        <?php
         
            // Simulons un tableau de produits pour l'exemple
            $products = [
                ["name" => "Pantalon Chino", "price" => "49.99€"],
                ["name" => "Pantalon Cargo", "price" => "59.99€"],
                ["name" => "Costume", "price" => "149.99€"],
                ["name" => "Jean", "price" => "39.99€"],
                ["name" => "Short", "price" => "29.99€"],
                ["name" => "Jogging", "price" => "34.99€"]
            ];

            foreach ($products as $product) {
                echo "<div class='product'>
                        <div class='product-image'></div>
                        <p>{$product['name']}</p>
                        <p>{$product['price']}</p>
                      </div>";
            }
        ?>
    </div>
</main>

<?php require_once '../php/footer.php'; ?>

<script src="../js/script.js"></script>
</body>
</html>
