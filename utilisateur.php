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

    <div id="userOptions" style="display: none;">
        <button id="editButton">Modifier</button>
        <button id="deleteButton">Supprimer</button>
    </div>
    
    <script>
        document.getElementById('userDropdown').addEventListener('change', function () {
            var dropdown = document.getElementById('userDropdown');
            var optionsDiv = document.getElementById('userOptions');

            if (dropdown.value !== "") {
                optionsDiv.style.display = 'block';
            } else {
                optionsDiv.style.display = 'none';
            }
        });

        document.getElementById('editButton').addEventListener('click', function () {
            var userId = document.getElementById('userDropdown').value;
            window.location.href = 'edit.php?id=' + userId; });


        document.getElementById('deleteButton').addEventListener('click', function () {
            var userId = document.getElementById('userDropdown').value;
            window.location.href = 'delete.php?id=' + userId;});
    </script>
</body>
</html>
