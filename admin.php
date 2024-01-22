<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f8f8;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Page Admin</h1>
        <label for="choix">Choisir une table</label>
        <select name="choix">
            <option value="user">Utilisateur</option>
            <option value="film">Film</option>
            <option value="reservation">Réservation</option>
        </select>
        <input type="submit" value="Choisir" name="submit">
        <input type="submit" value="Déconnexion" name="logout">
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
            $choix = $_POST['choix'];

            switch($choix) {
                case 'user':
                    header('Location: utilisateur.php');
                    break;
                case 'film':
                    header('Location: film.php');
                    break;
                case 'reservation':
                    header('Location: reservation.php');
                    break;
            }
            exit();
        }

        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: enregistrer.html');
            exit();
        }
    }
    ?>
</body>
</html>