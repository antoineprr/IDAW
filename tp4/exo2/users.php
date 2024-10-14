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

// TODO: add your code here
// retrieve data from database using fetch(PDO::FETCH_OBJ) and
// display them in HTML array
$request->execute();
$data = $request->fetch(PDO::FETCH_OBJ);

echo '<h1>Users</h1><ul>';
echo '<table>  <tbody>';
echo '
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">login</th>
      <th scope="col">email</th>
    </tr>
  </thead>';
while(!empty($data)) {
    echo '<tr>';
    echo '<th scope="row">'.$data->id.'</th><td>'.$data->login.'</td><td>'.$data->email.'</td>';
    echo '</tr>';
    $data = $request->fetch(PDO::FETCH_OBJ);
}
echo '</tbody></table>';


/*** close the database connection ***/

$pdo = null;

?>