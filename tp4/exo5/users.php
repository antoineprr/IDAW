<?php
    require_once("init_pdo.php");

    function get_users($db){
        $sql = "SELECT * FROM USERS";
        $exe = $db->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    function get_user($db, $login){
        $sql = "SELECT * FROM USERS WHERE login='".$login."'";
        $exe = $db->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    function add_user($db, $login, $email){
        $sqlSelect = "SELECT id FROM users WHERE login = :login";
        $requestSelect = $db->prepare($sqlSelect);
        $requestSelect->bindParam(':login', $login);
        $requestSelect->execute();
        $result = $requestSelect->fetch(PDO::FETCH_ASSOC);
        if($result){
            http_response_code(409);
            exit();
        }

        $sql = "INSERT INTO users (id, login, email) VALUES (NULL, :login, :email)";
        $request = $db->prepare($sql);
        $request->bindParam(':login', $login);
        $request->bindParam(':email', $email);
        $request->execute();
        return get_user($db, $login);
    }

    function modify_user($db, $old_login, $new_login, $new_email){
        $sqlSelect = "SELECT id FROM users WHERE login = '".$old_login."'";
        $requestSelect = $db->prepare($sqlSelect);
        $requestSelect->execute();
        $result = $requestSelect->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            http_response_code(404);
            exit();
        }

        $sqlSelect = "SELECT email FROM users WHERE login = :old_login;";
        $requestSelect = $db->prepare($sqlSelect);
        $requestSelect->bindParam(':old_login', $old_login);
        $requestSelect->execute();
        $result = $requestSelect->fetch(PDO::FETCH_ASSOC);

        $old_email = $result ? $result['email'] : '';
        
        $sqlUpdate = "UPDATE users SET login = :login, email = :email WHERE users.login = :old_login;";

        $requestUpdate = $db->prepare($sqlUpdate);
        if($new_login)
            $requestUpdate->bindParam(':login', $new_login);
        else
            $requestUpdate->bindParam(':login', $old_login);

        if($new_email)
            $requestUpdate->bindParam(':email', $new_email);
        else
            $requestUpdate->bindParam(':email', $old_email);
        
        $requestUpdate->bindParam(':old_login', $old_login);
        $requestUpdate->execute();

        if($new_login)
            return get_user($db, $new_login);

        return get_user($db, $old_login);
    }


    function delete_user($db, $login){
        $sqlSelect = "SELECT id FROM users WHERE login = :login;";
        $requestSelect = $db->prepare($sqlSelect);
        $requestSelect->bindParam(':login', $login);
        $requestSelect->execute();
        $result = $requestSelect->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            http_response_code(404);
            exit();
        }

        $sqlDelete = "DELETE FROM users WHERE  users.login = :login";
        $requestDelete = $db->prepare($sqlDelete);
        $requestDelete->bindParam(':login', $login);
        $requestDelete->execute();
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
            $input = json_decode(file_get_contents('php://input'), true);
            if(isset($input['login']) && isset($input['email'])){
                $result = add_user($pdo, $input['login'], $input['email']);
                setHeaders();
                http_response_code(201);
                exit(json_encode($result));
            }
            else{
                http_response_code(404);
                exit();
            }
        case 'PUT' :
            $input = json_decode(file_get_contents('php://input'), true);
            if(isset($input['old_login']) && (isset($input['new_login'])||isset($input['new_email']))){
                $new_login = isset($input['new_login']) ? $input['new_login'] : NULL;
                $new_email = isset($input['new_email']) ? $input['new_email'] : NULL;
                $result = modify_user($pdo, $input['old_login'], $new_login, $new_email);
                setHeaders();
                http_response_code(200);
                exit(json_encode($result));
            }
            else{
                http_response_code(204);
                exit();
            }
        case 'DELETE' :
            $input = json_decode(file_get_contents('php://input'), true);
            if(isset($input['login'])){
                delete_user($pdo, $input['login']);
                setHeaders();
                http_response_code(200);
                exit();
            }
            else{
                http_response_code(204);
                exit();
            }
    }