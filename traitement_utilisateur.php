<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["utilisateur"])) {
    $userId = $_POST["utilisateur"];
 
    $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
 
    $deleteUser = $bdd->prepare("DELETE FROM user WHERE id_user = :id_user");
    if ($deleteUser->execute(['id_user' => $userId])) {
        echo "L'utilisateur avec l'ID $userId a été supprimé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de la suppression de l'utilisateur.";
    }
 
    $bdd = null;
 
} else {
    echo "Veuillez sélectionner un utilisateur.";
}
?>
