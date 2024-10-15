<?php
    require_once("init_pdo.php");

    function get_users($db){
        $sql = "SELECT * FROM USER";
        $exe = $db->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    function setHeaders() {
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
        header("Access-Control-Allow-Origin: *");
        header('Content-type: application/json; charset=utf-8');
    }

    // ==============
    // Responses
    // ==============

    switch($_SERVER["REQUEST_METHOD"]) {
        case 'GET':
            $result = get_users($pdo);
            setHeaders();
            exit(json_encode($result));
        case 'POST':
            // https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
            http_response_code(501);
            exit(-1);
    }