<?php

include './database/database.php';

function emptyInputRegister($username, $password, $passwordRepeat, $email) {
    if(empty($username) || empty($password) || empty($passwordRepeat) || empty($email)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

    function invalidUid($username) {
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function pwdMatch ($password, $passwordRepeat) {
        if($password !== $passwordRepeat) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function userExist ($email) {
        $pdo = getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row = $resultData) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
    }

    function createUser($username, $email, $password, $datebirth) {
        $pdo = getConnection();
    
        // Gerar o hash da senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO users (username, email, password, datebirth) VALUES (:username, :email, :password, :datebirth)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashedPassword, 'datebirth' => $datebirth]);
    
        header("location: ../register.php?message=succes");
        exit();
    }
    
