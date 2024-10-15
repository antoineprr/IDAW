<?php
    require_once('config.php');

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