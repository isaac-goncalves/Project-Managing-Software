<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once('./functions/loginFunctions.php');
    require_once './database/database.php';

    error_log("Code Ran", 0);

    if (emptyInputLogin($username, $password) !== true) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    $user = loginUser($username, $password);

    Error_log("Error: " . print_r($user, true));

    if ($user == false) {
        header("location: ../login.php?error=stmtfailed");
        error_log("Login Failed", 0);
        exit();
    }
    error_log("Login succeeded", 0);
    //store on browser session
    session_start();
    $_SESSION['user'] = $user;
    Error_log("Error: " . print_r($user, true));
    Error_log("Session Data: " . print_r($_SESSION['user'], true));
    header("location: ../dashboard.php");
    exit();

} else {
    header("location: ../register.php");
    echo "error";
    exit();
}
