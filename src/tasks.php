<div class="loginStatusWrapper">
    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        echo "<h1>Welcome, " . $_SESSION['user']['username'] . "!</h1>";
    } else {
        echo "<h1>You are not logged in.</h1>";
    }
    ?>
    <form action="backend/logout.php" method="post">
        <button class='logoutButton' type="submit" name="logout-submit">Logout</button>
    </form>
</div>
<?php require_once('header.php'); ?>
<?php require_once('navbar.php'); ?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table .btn {
            margin-right: 5px;
        }

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
    <script type="text/javascript" src="./task.js"></script>
    <link rel="stylesheet" href="styles/dashboardStyles.css">
</head>

<body>
    <div id="chartWrapper" class="container card">
        <h1>Projetos</h1>
        <table class="table table-striped" id="projectTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <!-- now a logout button -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>