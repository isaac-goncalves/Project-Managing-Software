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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
    <link rel="stylesheet" href="styles/tasksedit.css">
    <script type="text/javascript" src="./tasksedit.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Edit Project</title>
</head>

<body>
    <div id="chartWrapper">
        <h1>Edit Project</h1>
        <form id="edit-project-form" action="update-project.php" method="post">

        </form>
        <form id="edit-project-form" action="./backend/editProject.php" method="post">
            <input type="hidden" name="project_id" id="edit-project-id" value="0">
            <label for="edit-name">Name</label>
            <input type="text" name="name" id="edit-name" required>
            <label for="edit-description">Description</label>
            <textarea name="description" id="edit-description" required></textarea>
            <label for="edit-start-date">Start Date</label>
            <input type="date" name="start_date" id="edit-start-date" required>
            <label for="edit-end-date">End Date</label>
            <input type="date" name="end_date" id="edit-end-date" required>
            <label for="edit-status">Status</label>
            <select name="status" id="edit-status" required>
                <option value="open">Open</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            <label for="edit-priority">Priority</label>
            <select name="priority" id="edit-priority" required>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
            <label for="edit-user-id">User ID</label>
            <input type="text" name="user_id" id="edit-user-id">
            <button type="submit">Save</button>
        </form>
    </div>
    <!-- now a logout button -->

</body>

</html>