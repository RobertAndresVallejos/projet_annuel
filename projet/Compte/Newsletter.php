<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription à la Newsletter</title>
    <link rel="stylesheet" href="../css/stylemoncompte.css"> <!-- Assurez-vous que le chemin est correct -->
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>
    <?php require_once '../php/header.php'; ?>


    <div class="container"> <!-- Conteneur principal pour sidebar et main content -->
        <div class="sidebar">
            <h3>Newsletter</h3>
            <ul>
                <li><a href="MonCompte.php">Mon Compte</a></li>
                <li><a href="#">Résumé</a></li>
                <li><a href="#">Commandes</a></li>
                <li><a href="#">Programmes de fidélité</a></li>
                <li><a href="#">Retours</a></li>
                <li><a href="datapersonnel.php">Données personnelles</a></li>
                <li><a href="#">Carte Cadeau</a></li>
                <li><a href="#">Mes tailles</a></li>
                <li><a href="#">Plus</a></li>
                <li><a href="#">Aide & contact</a></li>
            </ul>
        </div>

        <div class="main-content">
        <?php
        if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
            echo '<h2>Abonnez-vous à notre Newsletter</h2>';
            echo '<p>Recevez toutes nos actualités en premier, pour profiter de nos vêtements<p>';
            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                    <input type="hidden" name="email" value="' . $_SESSION['email'] . '">
                    <button type="submit" name="subscribe">S\'abonner</button>
                  </form>';
        } else {
            echo '<p>Veuillez vous connecter pour vous abonner à la newsletter.</p>';
        }
        ?>
    </div>
        
    </div>

    

    <?php require_once '../php/footer.php'; ?>
    <script src="../js/script.js"></script>
</body>
</html>
