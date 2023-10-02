<?php

session_start(); // Démarrez la session

// Remplacez ces informations par les données de votre base de données
$serveur = "localhost";
$nom_utilisateur = "votre_nom_utilisateur";
$mot_de_passe = "votre_mot_de_passe";
$base_de_donnees = "votre_base_de_donnees";

// Établissez la connexion à la base de données
$connexion = new mysqli($serveur, $nom_utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifiez si la connexion a réussi
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérez les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Requête SQL pour vérifier les informations d'identification
$sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$username' AND mot_de_passe = '$password'";
$resultat = $connexion->query($sql);

if ($resultat->num_rows > 0) {
    // L'utilisateur est connecté avec succès
    echo "Connexion réussie !";

    // Vous pouvez rediriger l'utilisateur vers une autre page ici
} else {
    // L'utilisateur n'a pas pu se connecter
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}

// Fermez la connexion à la base de données
$connexion->close();
?>
