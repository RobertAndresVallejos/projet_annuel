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
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
        <?php require_once ("../php/database.php") ?>
        <?php require_once '../php/header.php'; ?>
        <?php require_once 'filtre.php'; ?>


        <main>
            <?php require_once 'requete_filtre.php'; ?>

        </main>

        <?php require_once '../php/footer.php'; ?>
        <script src="../js/script.js"></script>
    </body>
</html>

