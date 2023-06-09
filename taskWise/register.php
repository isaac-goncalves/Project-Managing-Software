<?php

require_once('navbar.php');

if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
        echo '<div class="alert alert-danger">Fill in all fields!</div>';
    } else if ($_GET['error'] == "invaliduid") {
        echo '<div class="alert alert-danger">Choose a proper username!</div>';
    } else if ($_GET['error'] == "passwordsdontmatch") {
        echo '<div class="alert alert-danger">Passwords don\'t match!</div>';
    } else if ($_GET['error'] == "usernametaken") {
        echo '<div class="alert alert-danger">Username already taken!</div>';
    } else if ($_GET['error'] == "stmtfailed") {
        echo '<div class="alert alert-danger">Something went wrong, try again!</div>';
    }
}

if (isset($_GET['message'])) {
    if ($_GET['message'] == "succes") {
        echo '<div class="alert alert-success">Register successful!</div>';
    }
}

?>

<head>
    <title> Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<html>
<div class="loginWrapper">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
    <link rel="stylesheet" href="styles/registerStyles.css">
    <h1> Register </h1>
    <form action="/src/backend/registerUser.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="passwordRepeat" placeholder="Password">
        <button type="submit">Registrar</button>
        <form>
</div>

</html>