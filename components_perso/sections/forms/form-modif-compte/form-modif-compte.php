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

    // Récupérez les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifiez si le mot de passe correspond à la confirmation du mot de passe
    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
    } else {
        // Hachez le nouveau mot de passe avant de le stocker en base de données (utilisez des méthodes de hachage sécurisées)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Requête SQL pour mettre à jour le compte de l'utilisateur
        $sql = "UPDATE utilisateurs SET nom_utilisateur = ?, mot_de_passe = ? WHERE id = ?";

        // Utilisez une requête préparée pour des raisons de sécurité
        if ($stmt = $connexion->prepare($sql)) {
            // Remplacez 'votre_id_utilisateur' par l'ID de l'utilisateur que vous souhaitez mettre à jour
            $id_utilisateur = $_SESSION['utilisateur_connecte']['id'];

            // Liez les paramètres et exécutez la requête
            $stmt->bind_param("ssi", $username, $hashed_password, $id_utilisateur);
            if ($stmt->execute()) {
                echo "Compte mis à jour avec succès !";

                // Vous pouvez rediriger l'utilisateur vers une page de profil ou une autre page ici
            } else {
                echo "Erreur lors de la mise à jour du compte : " . $stmt->error;
            }

            // Fermez la requête préparée
            $stmt->close();
        }
    }

    // Fermez la connexion à la base de données
    $connexion->close();
} else {
    echo "Vous n'êtes pas connecté.";
}
?>
