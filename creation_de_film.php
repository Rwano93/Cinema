<?php

// Connexion à la base de données

$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root',);


$req = $bdd->prepare('INSERT INTO film (titre, auteur, resume, date_sortie) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['titre'], $_POST['auteur'], $_POST['resume'], $_POST['date_sortie']));

if(isset($_POST['titre']) AND isset($_POST['auteur']) AND isset($_POST['resume']) AND isset($_POST['date_sortie']))
{
    echo 'Le film a bien été ajouté !';
}
else
{
    echo 'Veuillez remplir tous les champs !';
}

?>