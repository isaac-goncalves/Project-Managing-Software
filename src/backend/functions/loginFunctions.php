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
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);

    if ($stmt->rowCount() > 0) {
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
        $storedPassword = $resultData['password'];

        // Verificar se a senha fornecida corresponde à senha armazenada
        if (password_verify($password, $storedPassword)) {
            error_log("Informação da Query: " . print_r($resultData, true));
            return $resultData;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


