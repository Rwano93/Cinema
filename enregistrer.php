<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $requete = $bdd->prepare("SELECT email, mdp FROM user WHERE email = :email, mdp =:mdp");
    $requete->execute(['email' => $email]);
    $result = $requete->fetch();

    if ($result && $password == $result['mdp']) {
       echo "<p>Vous êtes connecté</p>";
    }
    if ($_POST['mail' == 'admin']  && $_POST['password' == 'admin']) {
        header('Location: admin.php');
        exit();
    }
    else {
        echo "<p>Erreur d'authentification</p>";
    }
   


}
?>
