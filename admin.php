<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélection et Suppression d'Utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
    <h1>Sélection et Suppression d'Utilisateur</h1>
 
    <form action="" method="post">
        <label for="choix">Choisissez une option :</label>
        <select id="choix" name="choix">
            <option value="user">User</option>
            <option value="film">Film</option>
            <option value="reservation">Reservation</option>
        </select>
 
        <input type="submit" value="Choisir" name="choisir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['choisir'])) {
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
    }
    ?>
</body>