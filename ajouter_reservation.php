<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $prix = $_POST['prix'];
    $moyen_paiement = $_POST['moyen_paiement'];
    $ref_user = $_POST['ref_user'];
    $ref_film = $_POST['ref_film'];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $requete = $bdd->prepare("INSERT INTO reservations (date, prix, moyen_paiement, ref_user, ref_film) VALUES (:date, :prix, :moyen_paiement, :ref_user, :ref_film)");
    $requete->execute(['date' => $date, 'prix' => $prix, 'moyen_paiement' => $moyen_paiement, 'ref_user' => $ref_user, 'ref_film' => $ref_film]);

    $result = $requete->rowCount();
    if ($result > 0) {
        echo "Réservation réussie!";
        header('Location: reservation.php');
    } else {
        echo "Erreur lors de la réservation";
    }
} else {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Récupérer tous les utilisateurs
    $req_user = $bdd->prepare('SELECT id_user, nom, prenom FROM user');
    $req_user->execute();
    $users = $req_user->fetchAll();

    // Récupérer tous les films
    $req_film = $bdd->prepare('SELECT id_film, titre FROM film');
    $req_film->execute();
    $films = $req_film->fetchAll();
}
?>

<html>
<head>
    <title>Ajouter une réservation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="reservation.php">
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date"><br>
        <label for="prix">Prix:</label><br>
        <input type="text" id="prix" name="prix"><br>
        <label for="moyen_paiement">Moyen de paiement:</label><br>
        <input type="text" id="moyen_paiement" name="moyen_paiement"><br>
        <label for="ref_user">Référence utilisateur:</label><br>
        <select id="ref_user" name="ref_user">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['id_user']; ?>">
                    <?php echo $user['nom']; ?> <?php echo $user['prenom']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <label for="ref_film">Référence film:</label><br>
        <select id="ref_film" name="ref_film">
            <?php foreach ($films as $film): ?>
                <option value="<?php echo $film['id_film']; ?>">
                    <?php echo $film['titre']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>