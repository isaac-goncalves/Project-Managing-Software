<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log(print_r($_SERVER, true));
    if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
        header('HTTP/1.0 403 Forbidden');
        echo json_encode(['message' => 'Authentication required.']);
        exit();
    } else {
        $authHeader = explode(' ', $_SERVER['HTTP_AUTHORIZATION']);
        if (count($authHeader) == 2 && $authHeader[0] == 'Basic') {
            $credentials = base64_decode($authHeader[1]);
            if ($credentials !== false) {
                list($email, $password) = explode(':', $credentials, 2);
            } else {
                header('HTTP/1.0 401 Unauthorized');
                echo json_encode(['message' => 'Invalid authorization header.']);
                exit();
            }
        } else {
            header('HTTP/1.0 401 Unauthorized');
            echo json_encode(['message' => 'Invalid authorization header.']);
            exit();
        }
    }

    require_once('./functions/loginFunctions.php');
    require_once './database/database.php';

    if (emptyInputLogin($email, $password) == false) {
        header('HTTP/1.0 400 Bad Request');
        echo json_encode(['error' => 'emptyinput']);
        exit();
    }

    $user = loginUser($email, $password);

    if ($user == false) {
       
        header('HTTP/1.0 401 Unauthorized');
        echo json_encode(['error' => 'wronglogin']);
        exit();
    }

    session_start();
    $_SESSION['user'] = $user;

    echo json_encode(['message' => 'Login succeeded', 'user' => $user]);
    exit();
} else {
    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode(['message' => 'Invalid request method.']);
    exit();
}
