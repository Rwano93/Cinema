<?php
$id = $_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
$requete = $bdd->prepare("DELETE FROM film WHERE id_film = :id");
$requete->execute(['id' => $id]);

header("Location: creation_de_film.php");
?>