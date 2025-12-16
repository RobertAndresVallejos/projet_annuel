<?php
require_once("./php/database.php"); // Assurez-vous que ce chemin mène à votre script de connexion à la base de données
session_start();

if (isset($_GET['token']) && !empty($_GET['token'])) {
    $token = $_GET['token'];

    // Préparer la requête pour vérifier si le token existe et est valide
    $stmt = $pdo->prepare("SELECT * FROM client WHERE verification_token = ? AND verified = 0");
    $stmt->execute([$token]);

    if ($stmt->rowCount() > 0) {
        // Le token existe et le compte n'est pas encore vérifié
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Mettre à jour le statut de vérification de l'utilisateur
        $updateStmt = $pdo->prepare("UPDATE client SET verified = 1 WHERE verification_token = ?");
        $updateStmt->execute([$token]);

        if ($updateStmt->rowCount() > 0) {
            $_SESSION['success'] = "Votre compte a été vérifié avec succès. Vous pouvez maintenant vous connecter.";
            header('Location: login.php');
            exit;
        } else {
            $_SESSION['error'] = "Nous avons rencontré un problème lors de la vérification de votre compte. Veuillez réessayer.";
            header('Location: error.php'); // Assurez-vous d'avoir une page pour gérer les erreurs
            exit;
        }
    } else {
        $_SESSION['error'] = "Le lien de vérification est invalide ou le compte a déjà été vérifié.";
        header('Location: error.php'); // Assurez-vous d'avoir une page pour gérer les erreurs
        exit;
    }
} else {
    $_SESSION['error'] = "Aucun token de vérification fourni.";
    header('Location: error.php'); // Assurez-vous d'avoir une page pour gérer les erreurs
    exit;
}
?>

