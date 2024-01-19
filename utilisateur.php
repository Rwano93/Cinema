<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        h1 {
            text-align: center;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f8f8f8;
        }
        button {
            border-radius: 20px;
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h1>Utilisateur</h1>
        <select id="userDropdown" class="form-control">
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
        <button onclick="location.href='admin.php'">Retour à l'administration</button>
    </div>
</body>
</html>