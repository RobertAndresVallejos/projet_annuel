<?php
session_start();

// Génération d'un code aléatoire
$code = rand(1000, 9999);
$_SESSION["captcha"] = $code;

// Création de l'image
$height = 40;
$width = 100;
$image = imagecreate($width, $height);

// Couleurs
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

// Remplir l'arrière-plan
imagefill($image, 0, 0, $white);

// Ajouter le texte
imagestring($image, 5, 10, 10, $code, $black);

// Envoyer l'image
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>
