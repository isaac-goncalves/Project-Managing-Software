<?php

include './database/database.php';

function emptyInputLogin($username, $password) {
    if(empty($username) || empty($password)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}


function loginUser($username, $password) {
    // error_log("função Login user: " . $username . "\n Password: " . $password);
    $pdo = getConnection();
    $sql = "SELECT * FROM users WHERE usersUid = :username AND usersPwd = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password]);

    // Error_log("Error: " . $stmt->rowCount());

    if ($stmt->rowCount() > 0) {
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
        Error_log("Informação da Query: " . print_r($resultData, true));
        return $resultData;
    } else {
        return false;
    }
}

