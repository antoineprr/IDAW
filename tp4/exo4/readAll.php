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

    $request = $pdo->prepare("select * from users");

    $request->execute();
    $data = $request->fetch(PDO::FETCH_OBJ);

    require_once('template_list.php');
    while(!empty($data)) {
        echo '<tr>';
        echo '<th scope="row">'.$data->id.'</th><td>'.$data->login.'</td><td>'.$data->email.'</td>';
        echo '</tr>';
        $data = $request->fetch(PDO::FETCH_OBJ);
    }
    echo '</tbody></table>';

    require_once('close.php');
?>