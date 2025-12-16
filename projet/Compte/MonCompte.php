<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - ThatWay</title>
    <link rel="stylesheet" href="../css/stylemoncompte.css"> <!-- Assurez-vous que le chemin est correct -->
    <link rel="stylesheet" href="../css/header.css"> <!-- Assurez-vous que le chemin est correct -->
    <link rel="stylesheet" href="../css/footer.css"> <!-- Assurez-vous que le chemin est correct -->


</head>
<body>
    <?php include '../php/header.php'; ?> <!-- Assurez-vous que le chemin vers le fichier PHP est correct -->

    <div class="container"> <!-- Conteneur principal pour sidebar et main content -->
        <div class="sidebar">
            <h3>Mon compte</h3>
            <ul>
                <li><a href="#">Résumé</a></li>
                <li><a href="#">Commandes</a></li>
                <li><a href="#">Programmes de fidélité</a></li>
                <li><a href="#">Retours</a></li>
                <li><a href="datapersonnel.php">Données personnelles</a></li>
                <li><a href="Newsletter.php">Newsletters</a></li>
                <li><a href="#">Carte Cadeau</a></li>
                <li><a href="#">Mes tailles</a></li>
                <li><a href="#">Plus</a></li>
                <li><a href="#">Aide & contact</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Mon Compte</h1>
            <p>Votre espace client ThatWay, vous pouvez gérer vos commandes et vos retours, ainsi que vos informations personnelles.</p>
            <h2>Mises à jour de vos dernières commandes</h2>
            <button onclick="window.location.href='commandes.html';">Voir toutes les commandes</button>
        </div>
    </div>

    <?php require_once '../php/footer.php'; ?>
</body>
</html>
