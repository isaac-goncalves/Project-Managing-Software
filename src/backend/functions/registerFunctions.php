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

    function uuidExist ($username) {
        $pdo = getConnection();
        $sql = "SELECT * FROM users WHERE usersUid = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row = $resultData) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
    }

    function createUser ( $username, $email, $password) {
        // function insertToDatabase($name, $description, $start_date, $end_date, $status, $priority, $user_id) {
        //     $pdo = getConnection();
        //     $sql = "INSERT INTO projects (name, description, start_date, end_date, status, priority, user_id) VALUES (:name, :description, :start_date, :end_date, :status, :priority, :user_id)";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->execute(['name' => $name, 'description' => $description, 'start_date' => $start_date, 'end_date' => $end_date, 'status' => $status, 'priority' => $priority, 'user_id' => $user_id]);
        // }
   
        $pdo = getConnection();
        
        $sql = "INSERT INTO users (usersUid, usersEmail, usersPwd) VALUES (:usersUid, :usersEmail, :usersPwd)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['usersUid' => $username, 'usersEmail' => $email, 'usersPwd' => $password]);

        header("location: ../register.php?message=succes");
        exit();
    }
