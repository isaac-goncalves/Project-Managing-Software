<?php

require_once('header.php');

require_once('navbar.php');

if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    } else if ($_GET['error'] == "stmtfailed") {
        echo "<p>Something went wrong, try again!</p>";
    }
}

// if (isset($_GET['message'])) {
//     if ($_GET['message'] == "succes") {
//         echo "<p>Register succesful!</p>";
//     }
// }

?>

<html>
<link rel="stylesheet" href="styles/loginStyles.css">
<div class="loginWrapper">
    <h1> Login </h1>
    <form action="/ccpmClone/src/backend/loginUser.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
        <form>
</div>

</html>