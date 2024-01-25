<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $requete = $bdd->prepare("SELECT id_user, nom, prenom, email, mdp FROM user WHERE email = :email AND mdp = :mdp");
    $requete->execute(['email' => $email, 'mdp' => $password]);
    $result = $requete->fetch();

    if ($result) {
        
        $_SESSION["email"] = $result["email"];
        $_SESSION["mdp"] = $result["mdp"];
        header("Location: admin.php");

    }if ($result["email"] == "admin" && $result["mdp"] == "admin") {
        $_SESSION["email"] = $result["email"];
        $_SESSION["mdp"] = $result["mdp"];
        header("Location: admin.php");
    } 
    else {
        header("Location:index.php");

    }
}


?>
