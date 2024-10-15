<?php
    require_once('config.php');

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