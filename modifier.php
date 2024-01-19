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
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>">

            <label for="prenom">Prénom</label>
            

            <label for="mail">Email</label>
            <input type="email" id="mail" name="mail" value="<?php echo $user['email']; ?>">

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="<?php echo $user['mdp']; ?>">

            <input type="submit" class="blue-button" value="Modifier" name="modifier">
            <input type="submit" class="back-button" value="Revenir en arrière" name="arriere">
        </form>
    </div>
</body>
</html>

<?php
// Assurez-vous que ces lignes sont au début de votre fichier
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
$id = $_GET['id']; // Assurez-vous que l'ID est passé dans l'URL

// Récupération des informations de l'utilisateur
$req = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
$req->execute(array($id));
$user = $req->fetch();

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['arriere'])) {
        // Redirige l'utilisateur vers utilisateur.php
        header('Location: utilisateur.php');
        exit;
    }

    if (isset($_POST['modifier'])) {
        // Récupération des informations du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['password'];

        // Préparation de la requête SQL
        $requete = $bdd->prepare("UPDATE user SET nom = ?, prenom = ?, email = ?, mdp = ? WHERE id_user = ?");

        // Exécution de la requête SQL
        $result = $requete->execute([$nom, $prenom, $email, $mdp, $id]);

        if ($result) {
            echo "Modification réussie!";
            header ('Location: utilisateur.php');
        } else {
            echo "Erreur lors de la modification";
        }
    }
}
?>