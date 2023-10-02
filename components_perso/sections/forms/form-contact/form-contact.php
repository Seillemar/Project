<?php
if(isset($_POST['submit'])) {
    $to = "contact@monsieurcode.dev";
    $subject = "Nouveau message de formulaire de contact";
    $message = "Nom : " . $_POST['nom'] . "\n\nE-mail : " . $_POST['email'] . "\n\nMessage : " . $_POST['message'];
    $headers = "From: " . $_POST['email'];
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($to, $subject, $message, $headers);
    // Utilisation de la fonction mail() pour envoyer l'e-mail
    if (mail($to, $$subject, $message, $headers)) {
        echo "<p>Merci, votre message a été envoyé avec succès à contact@monsieurcode.dev.</p>";
    } else {
        echo "<p>Une erreur est survenue lors de l'envoi de votre message.</p>";
    }
}
?>

