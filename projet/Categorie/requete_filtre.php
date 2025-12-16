<?php
require_once '../php/database.php'; // Assurez-vous que ce chemin est correct

// Initialisation des variables de filtre avec des valeurs par défaut sécurisées
$categorie = $_GET['categorie'] ?? null;
$marque = $_GET['marque'] ?? null;
$couleur = $_GET['couleur'] ?? null;
$taille = $_GET['taille'] ?? null;

// Début de la requête
$sql = "SELECT p.*, m.nom AS marque_nom
        FROM Produit p
        JOIN Marque m ON p.id_Marque = m.id_Marque
        WHERE 1 = 1"; // 1 = 1 est toujours vrai, cela simplifie l'ajout de conditions

// Ajout de conditions basées sur l'existence de filtres
if ($categorie) {
    $sql .= " AND p.id_Categorie = :categorie";
}
if ($marque) {
    $sql .= " AND p.id_Marque = :marque";
}
if ($couleur) {
    $sql .= " AND p.couleur = :couleur";
}
if ($taille) {
    $sql .= " AND p.taille = :taille";
}

// Préparation et exécution de la requête
$request = $pdo->prepare($sql);

// Liaison des paramètres
if ($categorie) {
    $request->bindParam(':categorie', $categorie);
}
if ($marque) {
    $request->bindParam(':marque', $marque);
}
if ($couleur) {
    $request->bindParam(':couleur', $couleur);
}
if ($taille) {
    $request->bindParam(':taille', $taille);
}

$request->execute();
$filtered_products = $request->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
echo "<div class='produit'>";
foreach ($filtered_products as $product) {
    echo "<a href='details_produit.php?id=" . htmlspecialchars($product['id_Produit']) . "' class='product-link'>";
    echo "<div class='product'>";
    echo "<div class='product-image'></div>"; // Vous pouvez ajouter une image si nécessaire
    echo "<p>" . htmlspecialchars($product['nom']) . "</p>";
    echo "<p>" . htmlspecialchars($product['prix']) . "</p>"; // Assurez-vous que la clé 'prix' existe dans votre requête
    echo "</div>";
    echo "</a>";
}
echo "</div>";

?>
