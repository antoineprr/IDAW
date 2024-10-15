<?php
    require_once('config.php');

    $connectionString = "mysql:host=". _MYSQL_HOST;

    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;

    $connectionString .= ";dbname=" . _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );

    $pdo = NULL;
    try {
        $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }
    if(isset($_POST['old_login']) && !empty($_POST['old_login'])){

        $sqlSelect = "SELECT email FROM users WHERE login = :old_login;";
        $requestSelect = $pdo->prepare($sqlSelect);
        $requestSelect->bindParam(':old_login', $_POST['old_login']);
        $requestSelect->execute();
        $result = $requestSelect->fetch(PDO::FETCH_ASSOC);

        $old_email = $result ? $result['email'] : '';
        
        $sqlUpdate = "UPDATE users SET login = :login, email = :email WHERE users.login = :old_login;";

        $requestUpdate = $pdo->prepare($sqlUpdate);
        if(isset($_POST['new_login']) && !empty($_POST['new_login']))
            $requestUpdate->bindParam(':login', $_POST['new_login']);
        else
            $requestUpdate->bindParam(':login', $_POST['old_login']);

        if(isset($_POST['new_email']) && !empty($_POST['new_email']))
            $requestUpdate->bindParam(':email', $_POST['new_email']);
        else
            $requestUpdate->bindParam(':email', $old_email);
        

        $requestUpdate->bindParam(':old_login', $_POST['old_login']);
        $requestUpdate->execute();
    }

    header('Location: users.php');
    require_once('close.php');
?>