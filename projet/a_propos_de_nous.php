<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - ThatWay</title>
    <link rel="stylesheet" href="../css/stylemoncompte.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <?php include '../php/header.php'; ?>
    <?php session_start(); ?>

    <div class="container">
        <div class="sidebar">
            <!-- Votre sidebar ici -->
        </div>

        <div class="main-content">
            <h1>Données personnelles</h1>
            <div id="info-display" class="form-container">
                <p>Nom : <?= htmlspecialchars($_SESSION['nom']) ?></p>
                <p>Prénom : <?= htmlspecialchars($_SESSION['prenom']) ?></p>
                <p>Email : <?= htmlspecialchars($_SESSION['email']) ?></p>
                <p>Date de naissance : <?= htmlspecialchars(date("d/m/Y", strtotime($_SESSION['date_anniversaire']))) ?></p>
                <button onclick="toggleEdit(true)">Modifier</button>
            </div>

            <div id="info-edit" class="form-container" style="display:none;">
                <form action="update_profile.php" method="POST">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($_SESSION['nom']) ?>">

                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($_SESSION['prenom']) ?>">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['email']) ?>">

                    <label for="date_anniversaire">Date de Naissance</label>
                    <input type="date" id="date_anniversaire" name="date_anniversaire" value="<?= htmlspecialchars($_SESSION['date_anniversaire']) ?>">

                    <button type="submit">Mettre à jour</button>
                    <button type="button" onclick="toggleEdit(false)">Annuler</button>
                </form>
            </div>
        </div>
    </div>

    <?php include '../php/footer.php'; ?>
    <script src="../js/modif_info.js"></script>
</body>
</html>
