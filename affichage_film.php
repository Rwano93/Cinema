<?php

//Afficher le film au complet 



if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $film = $bdd->prepare('SELECT * FROM film WHERE id = ?');
    $film->execute(array($get_id));
    if($film->rowCount() == 1) {
        $film = $film->fetch();
        $titre = $film['titre'];
        $auteur = $film['auteur'];
        $date_sortie = $film['date_sortie'];
        $resume = $film['resume'];
    } else {
        die('Ce film n\'existe pas !');
    }
} else {
    die('Erreur');
}