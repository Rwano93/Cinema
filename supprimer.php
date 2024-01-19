<?php
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $requete = $bdd->prepare("DELETE FROM user WHERE id_user = :id");
    $requete->execute(['id' => $id]);

    echo "<p>Utilisateur supprimé</p>";
    header('Location: utilisateur.php');
} else {
    echo "<p>Aucun utilisateur spécifié</p>";
}
?>