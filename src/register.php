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
    } else if ($_GET['error'] == "none") {
        echo "<p>You have signed up!</p>";
    }
}

?>

<html>
<h1> Register </h1>
<form action="/src/backend/registerUser.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
    <form>

</html>