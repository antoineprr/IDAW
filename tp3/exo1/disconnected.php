<?php 
    session_start();
    if(session_status()==2){
        session_unset();
        session_destroy();
        echo "Déconnexion réussie.";
    }
    else {
        echo "Pas de session active";
    }
    echo "<br>"; 
    echo "<a href=login.php>Page de connexion</a>";   
?>