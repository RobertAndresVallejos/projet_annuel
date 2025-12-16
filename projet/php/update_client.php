<?php
session_start();
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $date_anniversaire = $_POST['date_anniversaire'] ?? '';

    $stmt = $pdo->prepare("UPDATE client SET nom = ?, prenom = ?, email = ?, date_anniversaire = ? WHERE id_Client = ?");
    $success = $stmt->execute([$nom, $prenom, $email, $date_anniversaire, $_SESSION['user_id']]);

    if ($success) {
        echo "<p>Mise à jour réussie.</p>";
    } else {
        echo "<p>Erreur lors de la mise à jour des informations.</p>";
    }
} else {
    echo "<p>Requête non autorisée.</p>";
}
?>
