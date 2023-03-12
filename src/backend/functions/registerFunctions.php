<?php

function emptyInputRegister($username, $password, $passwordRepeat) {
    if(empty($username) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    }
    else {
        $result = false;
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

    function uidExists ($conn, $username) {
        $sql = "SELECT * FROM users WHERE usersUid = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser ($conn, $username, $password) {
        $sql = "INSERT INTO users (usersUid, usersPwd) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
                            
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../register.php?error=none");
        exit();
    }

?>