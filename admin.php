<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélection et Suppression d'Utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
    <h1>Sélection et Suppression d'Utilisateur</h1>
 
    <form action="traitement_utilisateur.php" method="post">
        <label for="utilisateur">Choisissez un utilisateur :</label>
        <select id="utilisateur" name="utilisateur">
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
            $requete = "SELECT id_user, nom, email, date FROM user"; 
            
            $resultat = $bdd->query($requete);
 
            foreach ($resultat as $utilisateur) {
                $dateNaissance = new DateTime($utilisateur['date']); 
                $aujourdHui = new DateTime(); 
                $age = $aujourdHui->diff($dateNaissance)->y; 
 
                echo "<option value='" . $utilisateur['id_user'] . "'>" . "ID: " . $utilisateur['id_user'] . " - " . $utilisateur['nom'] . " - Email: " . $utilisateur['email'] ."</option>";
            }
            ?>
        </select>
 
        <input type="submit" value="Supprimer l'utilisateur" name="supprimer">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['supprimer'])) {
            $idUtilisateurASupprimer = $_POST['utilisateur'];


            $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
            $requeteSuppression = "DELETE FROM user WHERE id_user = ?";
            $statement = $bdd->prepare($requeteSuppression);
            $statement->execute([$idUtilisateurASupprimer]);

            echo "<p>L'utilisateur avec l'ID $idUtilisateurASupprimer a été supprimé avec succès.</p>";
        }
    }
    ?>
 
</body>
</html>
