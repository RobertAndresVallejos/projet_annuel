<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion / Inscription</title>
    <link rel="stylesheet" href="./css/stylelogin.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">
    <script src="./js/script.js" defer></script>
</head>
<body>

    <a href="index.php">
        <img src="./test/Logo.png" alt="Logo" class="logo">
    </a>

    <div class="login-container">
        <div class="tabs">
            <button class="tab" data-form="login">Se connecter</button>
            <button class="tab" data-form="register">Créer un compte</button>
        </div>
        <div id="login" class="form-container">
            <form action="result_login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="mot_de_passe">Mot de Passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required>

                <img src="php/captcha.php" alt="CAPTCHA Image">
                <input type="text" name="captcha" placeholder="Entrez le code ici">

                <button type="submit">CONNEXION</button>
            </form>
        </div>
        <div id="register" class="form-container" style="display:none;">
            <form action="result.php" method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required>

                <label for="confirmation_de_mot_de_passe">Confirmer le mot de passe</label>
                <input type="password" id="confirmation_de_mot_de_passe" name="confirmation_de_mot_de_passe" required>

                <label for="date_anniversaire">Date de naissance</label>
                <input type="date" id="date_anniversaire" name="date_anniversaire" required>

                <img src="php/captcha.php" alt="CAPTCHA Image">
                <input type="text" name="captcha" placeholder="Entrez le code ici">

                <button type="submit">INSCRIPTION</button>
            </form>
        </div>
    </div>
</body>
</html>
