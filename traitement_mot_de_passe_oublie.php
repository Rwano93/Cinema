<?php
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $token = bin2hex(random_bytes(32));

    $sql = "UPDATE user SET reset_token = ? WHERE email = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$token, $email]);

    // Envoyer un e-mail à l'utilisateur avec un lien contenant le token
    $resetLink = "https://votre-site.com/reset_mot_de_passe.php?token=$token";
    $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe: $resetLink";
    mail($email, "Réinitialisation du mot de passe", $message);

    echo "Un lien de réinitialisation a été envoyé à votre adresse e-mail.";
}
?>

