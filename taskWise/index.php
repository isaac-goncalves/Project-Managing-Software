<?php

session_start();

// Verificar se o usuário está logado
if (isset($_SESSION['user']['username'])) {
    header('Location: projetos.php');
    exit();

    // Usuário logado, renderizar o conteúdo da página
};


require_once('navbar.php');

if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
        echo '<div class="alert alert-danger">Fill in all fields!</div>';
    }
    if ($_GET['error'] == "wronglogin") {
        echo '<div class="alert alert-danger">Incorrect login information!</div>';
    }
}

if (isset($_GET['message'])) {
    if ($_GET['message'] == "success") {
        echo '<div class="alert alert-success">Login successful!</div>';
    }
}
?>

<head>
    <title> Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">

<body>
    <div class="container">
        <div class="card ">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="card-header text-center">Login</h1>
                        <form id="loginForm" action="./backend/loginUser.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add the Bootstrap JS (optional, for certain components) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted!')
        console.log(e);
        var email = document.querySelector('input[name="email"]').value;
        var password = document.querySelector('input[name="password"]').value;
        var credentials = email + ':' + password;
        var encodedCredentials = btoa(credentials);

        fetch("http://localhost/backend/loginUser.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "Authorization": "Basic " + encodedCredentials
                },
                body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
            })
            .then(response => response.json())
            .then(data => {

                console.log(data);

                if (data.error) {
                    window.location.href = window.location.pathname + '?error=' + data.error;
                    return;
                }

                window.location.href = window.location.pathname + '?message=' + data.message;

            })

    });
</script>

</html>