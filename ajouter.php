<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter un utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="ajouter.php" method="post">
        <h1>Ajouter un utilisateur</h1>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>
        <br>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" required>
        <br>
        <label for="Email">Email</label>
        <input type="text" name="mail" id="mail" required>
        <br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="password2">Confirmer le mot de passe</label>
        <input type="password" name="password2" id="password2" required>
        <br>
        <input type="submit" name="ajouter" value="Ajouter">
        <input type="submit" name="arriere" value="Retour">
    </form>

    <?php
// Connexion à la base de données
$bdd = new PDO("mysql:host=localhost;dbname=cinemaproject;charset=utf8","root", "");

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    
    // Préparation et exécution de la requête SQL
    $requete = $bdd->prepare("INSERT INTO user (nom, prenom, email, mdp) VALUES (?,?,?,?)");
    $requete->execute(
        array(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["mail"],
            $_POST["password"],

        )
    );
    
    // Vérification de l'insertion
    $result = $requete->rowCount();
    if ($result > 0) {
        echo "Inscription réussie!";
        header('Location: utilisateur.php');
    } else {
        echo "Erreur lors de l'inscription";
    }
}
?>

</body>
</html>