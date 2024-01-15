php<?php

if(isset($_POST["mail"]) && ($_POST['password'])){
    foreach($user as $user){
        if(
            $user['mail'] == $_POST['mail']
            && $user['password'] == $_POST['password']
            
        ){
          
            
    }else{
        echo"l'utilisateurs ne sait pas connecter";


    }
}

}
