<?php
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
$confirm_password = $_POST['confirm_password'];

// Vérifiez si le mot de passe correspond à la confirmation du mot de passe
if ($password !== $confirm_password) {
    echo "Les mots de passe ne correspondent pas.";
} else {
    // Hachez le mot de passe avant de le stocker en base de données (utilisez des méthodes de hachage sécurisées)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Requête SQL pour insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe) VALUES ('$username', '$hashed_password')";
    
    if ($connexion->query($sql) === TRUE) {
        echo "Inscription réussie !";

        // Vous pouvez rediriger l'utilisateur vers la page de connexion ici
    } else {
        echo "Erreur lors de l'inscription : " . $connexion->error;
    }
}

// Fermez la connexion à la base de données
$connexion->close();
?>
