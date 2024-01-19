<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Page Admin</h1>
    <form action="" method="post">
        <style>
            form {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        </style>
        <label for="choix">Choisir une table</label>
        <select name="choix">
            <option value="user">Utilisateur</option>
            <option value="film">Film</option>
            <option value="reservation">Réservation</option>
        </select>

        <button type="submit" name="submit">Choisir</button>
        <button type="submit" name="logout">Déconnexion</button>
    </form>

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
                    header('Location: page_films.php');
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