<?php
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];

    $sql = "UPDATE user SET mdp = ?, reset_token = NULL WHERE reset_token = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$newPassword, $token]);
    
    echo "Le mot de passe a été réinitialisé avec succès.";
}
?>
