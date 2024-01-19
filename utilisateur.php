<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous Les Utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tous Les Utilisateurs</h1>

    <select id="userDropdown">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
        $reponse = $bdd->query('SELECT * FROM user');
        while ($donnees = $reponse->fetch()) {
            echo '<option value="' . $donnees['id_user'] . '">' . $donnees['prenom'] . '</option>';
        }
        ?>
    </select>

    <button onclick="location.href='ajouter.php'">Ajouter</button>
    <button onclick="location.href='modifier.php?id=' + document.getElementById('userDropdown').value">Modifier</button>
    <button onclick="location.href='supprimer.php?id=' + document.getElementById('userDropdown').value">Supprimer</button>

</body>
</html>