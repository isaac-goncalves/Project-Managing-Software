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
    <title> Resgister </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxx" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
<html>

<body>
    <div class="container">
        <div class="card ">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="card-header text-center">Register</h1>
                        <form action="./backend/registerUser.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordRepeat" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Add the Bootstrap JS (optional, for certain components) -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>