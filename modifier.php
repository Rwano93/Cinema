<?php
if (!isset($_GET['id'])) {
    header('Location: utilisateur.php');
    exit();
}

$id = $_GET['id'];

$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$req->execute(array($id));
$user = $req->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['modifier'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $req = $bdd->prepare('UPDATE users SET nom = ?, prenom = ?, mail = ?, password = ? WHERE id = ?');
        $req->execute(array($nom, $prenom, $mail, $password, $id));
    }
}
?>
