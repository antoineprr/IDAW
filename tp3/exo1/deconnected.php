<?php   
    session_start();
    session_unset();
    session_destroy();
    echo "Déconnexion réussie.";
    echo "<br>";
    echo "<a href=login.php>Page de connexion</a>";    
?>