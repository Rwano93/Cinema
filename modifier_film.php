<?php
$id = $_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exceptions

$requete = $bdd->prepare("SELECT * FROM film WHERE id_film = :id");
$requete->execute(['id' => $id]);
$film = $requete->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $resume = $_POST['resume'];
    $date_sortie = $_POST['date_sortie'];

    try {
        $requete = $bdd->prepare("UPDATE film SET titre = :titre, auteur = :auteur, resume = :resume, date_sortie = :date_sortie WHERE id_film = :id");
        $requete->execute(['titre' => $titre, 'auteur' => $auteur, 'resume' => $resume, 'date_sortie' => $date_sortie, 'id' => $id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    header("Location: film.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un film</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Assuming the CSS file is named style.css -->
</head>
<body>
    <div class="form-container"> <!-- Assuming there is a form-container class in the CSS -->
        <form method="post" action="modifier_film.php?id=<?php echo $id; ?>">
            <label for="titre">Titre:</label><br>
            <input type="text" id="titre" name="titre" value="<?php echo $film['titre']; ?>"><br>
            <label for="auteur">Auteur:</label><br>
            <input type="text" id="auteur" name="auteur" value="<?php echo $film['auteur']; ?>"><br>
            <label for="resume">Résumé:</label><br>
            <textarea id="resume" name="resume"><?php echo $film['resume']; ?></textarea><br>
            <label for="date_sortie">Date de sortie:</label><br>
            <input type="date" id="date_sortie" name="date_sortie" value="<?php echo $film['date_sortie']; ?>"><br>
            <input type="submit" value="Modifier">
        </form>
    </div>
</body>
</html>