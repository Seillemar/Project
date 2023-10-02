<?php
session_start(); // Démarrez la session

// Vérifiez si l'utilisateur est connecté en utilisant votre système d'authentification (par exemple, des sessions)
if (isset($_SESSION['utilisateur_connecte'])) {
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

    // Récupérez l'ID de l'utilisateur connecté depuis la session ou une autre méthode d'authentification
    $id_utilisateur_connecte = $_SESSION['utilisateur_connecte']['id'];

    // Requête SQL pour récupérer les informations du profil de l'utilisateur connecté
    $sql = "SELECT nom_utilisateur, mot_de_passe FROM utilisateurs WHERE id = ?";

    // Utilisez une requête préparée pour des raisons de sécurité
    if ($stmt = $connexion->prepare($sql)) {
        $stmt->bind_param("i", $id_utilisateur_connecte);
        $stmt->execute();
        $stmt->bind_result($nom_utilisateur, $mot_de_passe_hache);

        // Récupérez les résultats
        $stmt->fetch();

        // Fermez la requête préparée
        $stmt->close();
    }

    // Fermez la connexion à la base de données
    $connexion->close();
} else {
    echo "Vous n'êtes pas connecté.";
}
?>
