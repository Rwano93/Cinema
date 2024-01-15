<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

if(isset($_POST["mail"]) && isset($_POST['password'])){
    $res = $bdd->query('SELECT * FROM user');
    $users = $res->fetchAll();

    foreach($users as $user){
        if($user['mail'] == $_POST['mail'] && $user['password'] == $_POST['password']){
            echo "l'utilisateur c'est connecter";
            $_SESSION['user'] = $user;
            header('Location: index.php');
            exit();
        }
    }
    if ($_POST['mail' == 'admin']  && $_POST['password' == 'admin']) {
        header('Location: admin.php');
        exit();
    }
    echo "l'utilisateur ne c'est pas connecter";
}
?>

