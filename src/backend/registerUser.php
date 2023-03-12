<?php

include './database/database.php';

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    require_once('./functions/registerFunctions.php');
    require_once './database/database.php';

    if(emptyInputRegister($username, $password, $passwordRepeat) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !== false) {
        header("location: ../register.php?error=invaliduid");
        exit();
    }
    if(pwdMatch($password, $passwordRepeat) !== false) {
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn, $username) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $password);

}
else {
    header("location: ../register.php");
    exit();
}

?>