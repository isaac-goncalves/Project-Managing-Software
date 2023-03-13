<?php

require_once('header.php');

require_once('navbar.php');

if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    } else if ($_GET['error'] == "invaliduid") {
        echo "<p>Choose a proper username!</p>";
    } else if ($_GET['error'] == "passwordsdontmatch") {
        echo "<p>Passwords don't match!</p>";
    } else if ($_GET['error'] == "usernametaken") {
        echo "<p>Username already taken!</p>";
    } else if ($_GET['error'] == "stmtfailed") {
        echo "<p>Something went wrong, try again!</p>";
    }
}

if (isset($_GET['message'])) {
    if ($_GET['message'] == "succes") {
        echo "<p>Register succesful!</p>";
    }
}

?>

<html>
<div class="loginWrapper">
    <link rel="stylesheet" href="styles/registerStyles.css">
    <h1> Register </h1>
    <form action="/ccpmClone/src/backend/registerUser.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="passwordRepeat" placeholder="Password">
        <button type="submit">Registrar</button>
        <form>
</div>

</html>