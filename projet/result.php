<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <?php require_once("./php/database.php"); ?>
    <?php require_once('./php/header.php'); ?>
    <?php require_once('PHPMailer/vendor/autoload.php'); ?>
    <?php session_start(); // Assurez-vous que la session est démarrée au début du script ?>

    <main>
        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? ''; // Assurez-vous que c'est bien 'email' dans l'attribut name du formulaire
        $mot_de_passe = $_POST['mot_de_passe'] ?? '';
        $confirmation_de_mot_de_passe = $_POST['confirmation_de_mot_de_passe'] ?? '';
        $date_anniversaire = $_POST['date_anniversaire'] ?? '';
        $captcha = $_POST['captcha'] ?? '';
        $role = 'user';

        if (!isset($_SESSION['captcha']) || $captcha != $_SESSION['captcha']) {
            header('Location: login.php');
            exit;
        }

        if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe) || empty($confirmation_de_mot_de_passe)) {
            header('Location: login.php');
            exit;
        }

        if ($confirmation_de_mot_de_passe != $mot_de_passe) {
            echo 'Les mots de passe ne correspondent pas';
            exit;
        }

        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50)); // Création d'un token sécurisé

        $request = $pdo->prepare('INSERT INTO client (nom, prenom, email, mot_de_passe, date_anniversaire, verification_token, role) VALUES (:nom, :prenom, :email, :mot_de_passe, :date_anniversaire, :verification_token, :role)');


        $request->bindParam(':nom', $nom);
        $request->bindParam(':prenom', $prenom);
        $request->bindParam(':email', $email);
        $request->bindParam(':mot_de_passe', $mot_de_passe_hache);
        $request->bindParam(':date_anniversaire', $date_anniversaire);
        $request->bindParam(':verification_token', $token);
        $request->bindParam(':role', $role);
        $request->execute();

        if ($request->rowCount() === 1) {
            $verificationLink = "http://localhost/verify.php?token=$token";
            $body = "Merci de vous inscrire sur notre site. Veuillez cliquer sur le lien suivant pour vérifier votre compte: $verificationLink";

            $mailer = new PHPMailer(true); // Active les exceptions
            $mailer->isSMTP();
            $mailer->SMTPDebug = 2; // Active le débogage SMTP
            $mailer->Host = 'smtp.gmail.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = 'SuppThatWay@gmail.com';
            $mailer->Password = 'yxmsbnbtdbmjueal ';
            $mailer->SMTPSecure = 'tls';
            $mailer->Port = 587;
            $mailer->setFrom('SuppThatWay@gmail.com', 'ThatWay Support');
            $mailer->addAddress($email); // Envoi du mail à l'adresse de l'utilisateur
            $mailer->Subject = 'Vérifiez votre compte';
            $mailer->Body = $body;

            if (!$mailer->send()) {
                echo 'Erreur lors de l\'envoi de l\'email de vérification. ' . $mailer->ErrorInfo;
            } else {
                header('Location: confirmation_inscription.php');
                exit;
            }
        } else {
            echo 'Une erreur est survenue lors de l\'ajout de l\'utilisateur.';
        }
        ?>
    </main>

    <?php require_once('/php/footer.php'); ?>
</body>
</html>

