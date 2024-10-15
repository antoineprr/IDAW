<?php
    require_once('config.php');

    if(isset($_POST['login']) && !empty($_POST['login'])){
        $sqlAdd = "INSERT INTO users (id, login, email) VALUES (NULL, :login, :email)";
        $requestAdd = $pdo->prepare($sqlAdd);
        $requestAdd->bindParam(':login', $_POST['login']);
        $requestAdd->bindParam(':email', $_POST['email']);
        $requestAdd->execute();
    }

    header('Location: users.php');
    require_once('close.php');
?>