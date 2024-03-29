<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $datebirth = $_POST['datebirth'];

    require_once('./functions/registerFunctions.php');
    require_once './database/database.php';

    error_log("Error: Something went wrong", 0);

    if(emptyInputRegister($username, $password, $email, $datebirth) !== true)  {
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !== false) {
        header("location: ../register.php?error=invaliduid");
        exit();
    }
    if(pwdMatch($password, $passwordRepeat) !== false) {
        error_log("Error: Something went wrong", 0);
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }                                                           
    if(userExist( $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser( $username ,$email , $password , $datebirth);

}
else {
    header("location: ../register.php");
    echo "error";
    exit();
}
