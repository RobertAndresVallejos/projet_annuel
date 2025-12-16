<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - ThatWay</title>
    <link rel="stylesheet" href="../css/stylemoncompte.css"> <!-- Vérifiez que le chemin est correct -->
    <link rel="stylesheet" href="../css/header.css"> <!-- Vérifiez que le chemin est correct -->
    <link rel="stylesheet" href="../css/footer.css"> <!-- Vérifiez que le chemin est correct -->
    <script src="../js/modif_info.js" defer></script>
</head>


<body>
    <?php include '../php/header.php'; ?> <!-- Assurez-vous que le chemin vers le fichier PHP est correct -->
    <?php
    // Assurez-vous que l'utilisateur est connecté
    session_start();
    ?>

    <div class="container"> <!-- Conteneur principal pour la sidebar et le contenu principal -->
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
            <h1>Données personnelles</h1>
            <p>Votre espace personnel ThatWay.</p>
            <p>Vous pouvez modifier vos données personnelles à tout moment.</p>

            <div class="login-container">

                <div class="tabs">
                    <button class="tab" data-form="information">Information</button>
                    <button class="tab" data-form="modification">Modifier</button>
                </div>

                <div id="information" class="form-container">
                    <?php 
                        echo"<p>Email : " . $_SESSION['email'] . "</p>";
                        echo"<p>Nom : " . $_SESSION['nom'] . "</p>";
                        echo"<p>Prenom : " . $_SESSION['prenom'] . "</p>";
                        echo"<p>Date de naissance : " . $_SESSION['date_anniversaire'] . "</p>";
                        if(empty($_SESSION['telephone'])){
                            echo"<p>Telephone : Vous n'avez pas encore rentré de numéro";
                        }else{
                            echo"<p>Telephone : " . $_SESSION['telephone'] . "</p>";
                        }
                    ?>
                </div>

                <div id="modification" class="form-container" style="display:none;">
                    <form action="#" method="POST"> <!--../php/update_client.php-->
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"  placeholder="<?= htmlspecialchars($_SESSION['email']) ?>">

                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom"  placeholder="<?= htmlspecialchars($_SESSION['nom']) ?>">

                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom"  placeholder="<?= htmlspecialchars($_SESSION['prenom']) ?>">

                        <label for="date_anniversaire">Date de naissance</label>
                        <input type="date" id="date_anniversaire" name="date_anniversaire"  placeholder="<?= htmlspecialchars($_SESSION['date_anniversaire']) ?>">

                        <label for="telephone">Numéro de téléphone</label>
                        <input type="tel" id="telephone" name="telephone" placeholder="<?= htmlspecialchars($_SESSION['telephone'] ?? '') ?>" pattern="[0-9]{10}">

                        <button type="submit">Modifier</button>
                    </form>
                </div>
        </div>
        </div>
    </div>

    <?php require_once '../php/footer.php'; ?>
</body>
</html>

