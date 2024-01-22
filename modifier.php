<?php
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['arriere'])) {
        header('Location: utilisateur.php');
        exit;
    }

    if (isset($_POST['modifier'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['password'];

        $requete = $bdd->prepare("UPDATE user SET nom = ?, prenom = ?, email = ?, mdp = ? WHERE id_user = ?");
        $result = $requete->execute([$nom, $prenom, $email, $mdp, $id]);

        if ($result) {
            echo "Modification réussie!";
            header('Location: utilisateur.php');
            exit;
        } else {
            echo "Erreur lors de la modification";
        }
    }
} else {
    $id = $_GET['id'];
    $req = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
    $req->execute(array($id));
    $user = $req->fetch();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier Utilisateur</h1>
        <form action="modifier.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>">

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="<?php echo $user['mdp']; ?>">

            <input type="submit" class="blue-button" value="Modifier" name="modifier">
            <input type="submit" class="back-button" value="Revenir en arrière" name="arriere">
        </form>
    </div>
</body>
</html>