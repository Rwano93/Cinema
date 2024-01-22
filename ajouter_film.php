<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $resume = $_POST['resume'];
    $date_sortie = $_POST['date_sortie'];

    $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
    $requete = $bdd->prepare("INSERT INTO film (titre, auteur, resume, date_sortie) VALUES (:titre, :auteur, :resume, :date_sortie)");
    $requete->execute(['titre' => $titre, 'auteur' => $auteur, 'resume' => $resume, 'date_sortie' => $date_sortie]);

    header("Location: creation_de_film.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un film</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="ajouter_film.php">
        <label for="titre">Titre:</label><br>
        <input type="text" id="titre" name="titre"><br>
        <label for="auteur">Auteur:</label><br>
        <input type="text" id="auteur" name="auteur"><br>
        <label for="resume">Résumé:</label><br>
        <textarea id="resume" name="resume"></textarea><br>
        <label for="date_sortie">Date de sortie:</label><br>
        <input type="date" id="date_sortie" name="date_sortie"><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>