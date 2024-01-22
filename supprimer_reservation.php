<?php
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $req = $bdd->prepare('DELETE FROM reservations WHERE id_reservations = ?');
    $result = $req->execute(array($id));

    echo "<p>Utilisateur supprimé</p>";
    header('Location: reservation.php');
} else {
    echo "<p>Aucun utilisateur spécifié</p>";
}
?>