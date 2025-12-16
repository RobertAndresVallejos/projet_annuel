<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Site de Mode</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">
</head>

<body>
    <?php require_once './php/header.php'; ?>
    <div class="main-content">
        <h2>Des milliers de vêtements en promo pendant la semaine du Black Friday</h2>

        <div class="image-container">
            <div class="image-text">
                <a href="/Categorie/Accueil_homme.php">
                    <img src="/Categorie/Image/Mode_homme.jpg" alt="Vêtements Homme" class="banner-image">
                    <div class="overlay">Vêtements Homme</div>
                </a>    
            </div>

            <div class="image-text">
                <a href="/Categorie/Accueil_femme.php">
                    <img src="/Categorie/Image/Mode_femme.jpg" alt="Vêtements Femme" class="banner-image">
                    <div class="overlay">Vêtements Femme</div>
                </a>
            </div>
        </div>

        <div class="promo-container">
            <div class="promo-box" style="background-color: #9ACD32;">
                <p>Tu viens d'arriver ?</p>
                <p>Profite de ta réduction de 10%</p>
                <p>avec le code BIENVENUE10</p>
            </div>
            <div class="promo-box" style="background-color: #00CED1;">
                <p>Que ce soit du Tall, de l'extended size, des vêtements pour personnes de petites tailles et autres</p>
                <p>Vous trouverez forcément votre bonheur</p>
            </div>
            <div class="promo-box" style="background-color: #FF69B4;">
                <p>Devenez un membre premium et profiter</p>
                <p>1 an de livraison express gratuite</p>
                <p>Pour seulement 20 euros par an</p>
            </div>
            <div class="promo-box" style="background-color: #32CD32;">
                <p>Retours faciles et rapides</p>
                <p>Vous pouvez essayer puis payer plus tard ce que vous souhaitez garder</p>
            </div>
        </div>

    </div>
    <?php require_once './php/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>
