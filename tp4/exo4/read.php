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
    if(isset($_POST['login_read']) && !empty($_POST['login_read'])){

        $sqlSelect = "SELECT email FROM users WHERE login = :login;";
        $requestSelect = $pdo->prepare($sqlSelect);
        $requestSelect->bindParam(':login', $_POST['login_read']);
        $requestSelect->execute();
        $result = $requestSelect->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $email_read = $result['email'];
            echo "Email: " . $email_read;
        } else {
            echo "No email found for this login.";
        }
    }
    else
        echo "Login is empty or not valid.";

    echo "<p><a href='users.php'>Return to previous page</a></p>";
    //header('Location: users.php');
    require_once('close.php');
?>