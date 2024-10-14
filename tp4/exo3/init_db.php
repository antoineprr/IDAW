<?php
$DB_HOST = '127.0.0.1';
$DB_NAME = 'dbtest';
$DB_USER = 'root';
$DB_PWD = '';
$pdo = null;

try{
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME",
                            $DB_USER,
                            $DB_PWD,
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $filePath = 'create_db.sql';
    $sql = file_get_contents($filePath);

    $pdo->query($sql);


    echo "Base de données initialisée.";
}
catch(Exception $e){
    die('Error while connecting to MySQL.\n');
}
?>