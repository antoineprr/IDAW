<?php
    require_once('config.php');

    if(isset($_POST['login_delete']) && !empty($_POST['login_delete'])){
        $sqlDelete = "DELETE FROM users WHERE  users.login = :login";
        $requestDelete = $pdo->prepare($sqlDelete);
        $requestDelete->bindParam(':login', $_POST['login_delete']);
        $requestDelete->execute();
    }

    header('Location: users.php');
    require_once('close.php');
?>