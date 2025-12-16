<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Site de Mode</title>
    <link rel="stylesheet" href="/css/header.css"> <!-- Assurez-vous que le chemin est correct -->
</head>
<body>
<header>
    <nav class="navbar">
        <a href="/index.php">
            <img class="ImgLogo" src="/test/Logo.png" alt="Logo">
        </a>
        <button class="menu-toggle">☰</button>
        <ul class="nav-list" id="menu">
            <li><a href="/Categorie/accueil_Femme.php" class="full-width-link">Femme</a></li>
            <li><a href="/Categorie/accueil_Homme.php" class="full-width-link">Homme</a></li>
            <li>
                <div class="search-container">
                    <input type="text" placeholder="Vêtements, accessoires, ...">
                    <button type="button">Valider</button>
                </div>
            </li>
            <li><a href="#langue" class="full-width-link">Langue</a></li>
            <li><a href="/panier.php" class="full-width-link">Panier</a></li>
            <?php
            session_start();
            if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                echo '<li><a href="/Compte/MonCompte.php" class="full-width-link">Utilisateurs</a></li>';
                echo '<li><a href="/logout.php" class="full-width-link">Déconnexion</a></li>';
            } else {      
                echo '<li><a href="/login.php" class="full-width-link">Login</a></li>';       
            }
            ?>
        </ul>
    </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.querySelector('.menu-toggle');
    var menu = document.querySelector('.nav-list');
    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('active');
    });
});
</script>
</body>
</html>

