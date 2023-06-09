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
<html>
<style>


</style>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="styles/tasksedit.css"> -->
    <script type="text/javascript" src="./editarTask.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Edit Project</title>
</head>

<body class="container m-4 w-90 mx-auto">
    <?php require_once('navbar.php'); ?>
    <div id="chartWrapper">
        <center>
            <h1>Edit Task</h1>
        </center>
        <form action="./backend/editTask.php" method="post">

            <div class="form-group">
                <label for="task_id">Task ID</label>
                <input type="text" class="form-control" id="task_id" name="task_id" required>
            </div>

            <div class="form-group">
                <label for="projectId">Project ID</label>
                <input type="text" class="form-control" id="projectId" name="project_id" required>
            </div>
            <div class="form-group">
                <label for="taskName">Task Name</label>
                <input type="text" class="form-control" id="taskName" name="task_name" required>
            </div>
            <div class="form-group">
                <label for="taskDescription">Task Description</label>
                <textarea class="form-control" id="taskDescription" name="task_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="completed">Completed</label>
                <select class="form-control" id="completed" name="completed" required>
                    <option value="true">True</option>
                    <option value="false">False</option>
                </select>
            </div>
            <div class="form-group">
                <label for="createdAt">Created At</label>
                <input type="date" class="form-control" id="createdAt" name="created_at" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</body>



</html>