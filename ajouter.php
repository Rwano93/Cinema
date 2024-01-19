<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
<head>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h1>Ajouter un utilisateur</h1>

    <form action="" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">

        <label for="mail">Email :</label>
        <input type="email" id="mail" name="mail">

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Ajouter" name="ajouter">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['ajouter'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];

            $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
            $req = $bdd->prepare('INSERT INTO users(nom, prenom, mail, password) VALUES(:nom, :prenom, :mail, :password)');
            $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $mail,
                'password' => $password
            ));

            echo "L'utilisateur a été ajouté avec succès.";
        }
    }
    ?>
</body>
</html>