<?php
// Démarrer la session
session_start();

// Détruire la session de l'utilisateur
session_destroy();

// Rediriger vers la page de connexion
header('Location: testauthen.php');
exit();
?>