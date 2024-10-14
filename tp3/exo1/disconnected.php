<?php 
    if(!isset($_POST['login']) && !isset($_POST['password'])) {
        header("Location: login.php");
    }

    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
?>
