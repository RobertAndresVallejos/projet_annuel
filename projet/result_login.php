<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>

<?php
require_once('./php/database.php');
require_once('./php/header.php');
session_start(); // Important pour la gestion de la session et du CAPTCHA

ini_set('display_errors', 1);
error_reporting(E_ALL);

$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$email = $_POST['email'] ?? '';
$date_anniversaire = $_POST['date_anniversaire'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$mot_de_passe = $_POST['mot_de_passe'] ?? '';
$captcha = $_POST['captcha'] ?? '';

// Redirection si les champs sont vides
if (empty($email) || empty($mot_de_passe) || empty($captcha)) {
    header('Location: login.php?error=emptyfields');
    exit;
}

// Vérification du CAPTCHA
if ($captcha != $_SESSION['captcha']) {
    header('Location: login.php?error=captcha');
    exit;
}

$request = $pdo->prepare("SELECT * FROM client WHERE email = :email");
$request->bindParam(':email', $email);
$request->execute();
$result = $request->fetch(PDO::FETCH_ASSOC);

// Vérification des identifiants et du statut de vérification
if ($result && password_verify($mot_de_passe, $result["mot_de_passe"])) {
    if ($result['verified'] == 0) {
        // Si le compte n'est pas vérifié
        header('Location: login.php?error=notverified');
        exit;
    }
    // Connexion réussie, stockage de l'email dans la session
    $_SESSION["email"] = $result["email"];
    $_SESSION["role"] = $result["role"]; // Ajout du rôle de l'utilisateur à la session
    $_SESSION["nom"] = $result["nom"];
    $_SESSION["prenom"] = $result["prenom"];
    $_SESSION["date_anniversaire"] = $result["date_anniversaire"];
    $_SESSION["telephone"] = $result["telephone"];
    header('Location: index.php'); // Redirection vers la page principale
    exit;
} else {
    // Identifiants incorrects ou compte non trouvé
    header('Location: login.php?error=invalidcredentials');
    exit;
}
?>


    <main>
    </main>

    <?php require_once ('./php/footer.php') ?>

</body>

</html>
