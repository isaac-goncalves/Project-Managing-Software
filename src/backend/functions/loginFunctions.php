<?php

include './database/database.php';

function emptyInputLogin($email, $password) {
    if(empty($email) || empty($password)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}


function loginUser($email, $password) {
     error_log("função Login email: " . $email . "\n Password: " . $password);
    $pdo = getConnection();
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);

    // Error_log("Error: " . $stmt->rowCount());

    if ($stmt->rowCount() > 0) {
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
        Error_log("Informação da Query: " . print_r($resultData, true));
        return $resultData;
    } else {
        return false;
    }
}

