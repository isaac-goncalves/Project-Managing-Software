<?php





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

<head>
    <title> Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
<link rel="stylesheet" href="styles/loginStyles.css">

<body>
    <?php require_once('navbar.php'); ?>

    <div class="container">
        <div class="loginWrapper">
            <h1 class="text-center">Login</h1>
            <form action="./backend/loginUser.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>