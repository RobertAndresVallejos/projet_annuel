<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Envoyer un Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
<?php require_once './php/header.php'; ?>

    <h2>Contactez-nous</h2>
    <!-- sendmail.php -->
        <main>    
            <form action="mail.php" method="POST">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="mail">Email :</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="subject">Sujet :</label>
                <input type="text" id="subject" name="subject" required><br><br>

                <label for="message">Message :</label>
                <textarea id="message" name="message" required></textarea><br><br>

                <button type="submit">Envoyer</button>
            </form>
        </main>
        <?php require_once './php/footer.php'; ?>

</body>
</html>
