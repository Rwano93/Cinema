<?php
if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $film = $_POST['film'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $places = $_POST['places'];

    $req = $bdd->prepare('UPDATE reservation SET film = ?, date = ?, heure = ?, places = ? WHERE id_reservation = ?');
    $result = $req->execute(array($film, $date, $heure, $places, $id));

    if ($result) {
        echo "Réservation modifiée avec succès";
    } else {
        echo "Erreur lors de la modification";
    }
} else {
    $id = $_GET['id'];
    $req = $bdd->prepare('SELECT * FROM reservation WHERE id_reservation = ?');
    $req->execute(array($id));
    $reservation = $req->fetch();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Réservation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier Réservation</h1>
        <form action="modification_reservation.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="film">Film</label>
            <input type="text" id="film" name="film" value="<?php echo $reservation['film']; ?>">

            <label for="date">Date</label>
            <input type="date" id="date" name="date" value="<?php echo $reservation['date']; ?>">

            <label for="heure">Heure</label>
            <input type="time" id="heure" name="heure" value="<?php echo $reservation['heure']; ?>">

            <label for="places">Nombre de places</label>
            <input type="number" id="places" name="places" value="<?php echo $reservation['places']; ?>">

            <input type="submit" class="blue-button" value="Modifier" name="modifier">
            <input type="submit" class="back-button" value="Revenir en arrière" name="arriere">
        </form>
    </div>
</body>
</html>