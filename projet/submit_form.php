<?php
session_start();

// Vérification du CAPTCHA
if ($_POST['captcha'] == $_SESSION['captcha']) {
  // Code exécuté si le CAPTCHA est correct
  echo "CAPTCHA valide. Formulaire soumis avec succès.";
} else {
  // Code exécuté si le CAPTCHA est incorrect
  echo "CAPTCHA invalide. Veuillez réessayer.";
}
?>
