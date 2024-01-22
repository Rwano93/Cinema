<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $requete = $bdd->prepare("SELECT id_user, nom, prenom, email, mdp FROM user WHERE email = :email AND mdp = :mdp");
    $requete->execute(['email' => $email, 'mdp' => $password]);
    $result = $requete->fetch();

    if ($result && $password == $result['mdp']) {
        if ($email == 'admin' && $password == 'admin') {
            header('Location: admin.php');
            exit();
        } else {
            echo "<p>Vous êtes connecté</p>";
            header('Location: index.php');
            exit();
        }
    } else {
        echo "<p>Erreur d'authentification</p>";
    }


}
?>
