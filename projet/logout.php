<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon Blog - Utilisateurs</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>

    <?php require_once ("./php/database.php") ?>
    <?php require_once ('./php/header.php') ?>

    <main>
        <?php
        session_destroy();


        header('Location: ./index.php');
        ?>
    </main>

    <?php require_once ('./php/footer.php') ?>

</body>

</html