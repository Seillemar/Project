<?php
// Détruisez toutes les données de session
session_destroy();

// Redirigez l'utilisateur vers la page d'accueil ou une autre page de votre choix
header("Location: index.html"); // Remplacez "index.html" par l'URL de votre page d'accueil
exit();
?>
