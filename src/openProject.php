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

<head>
    <style>
        .table .btn {
            margin-right: 5px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxx" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <script type="text/javascript" src="./openProject.js"></script>
    <!-- <link rel="stylesheet" href="styles/tasks.css"> -->

    <script>
        // $(document).ready(function() {
        //     $('#myModal').modal();
        // });
    </script>

</head>

<body>
    <?php require_once('navbar.php'); ?>
    <div class="container mx-auto">
        <div class="card">
            <h1 id="projectName" class="card-header">Projeto: {NOME DO PROJETO}</h1>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-info font-weight-bold" for="description">Description:</label>
                                <span id="description"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-primary font-weight-bold" for="startDate">Start Date:</label>
                                <span id="startDate">2023-06-01</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-danger font-weight-bold" for="endDate">End Date:</label>
                                <span id="endDate">2023-06-30</span>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-warning font-weight-bold" for="priority">Prioridade:</label>
                                <span id="priority">High</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-success font-weight-bold" for="status">Status:</label>
                                <span id="status">In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Open Modal
    </button> -->
                <table class="table table-hover" id="projectTable">
                    <thead>
                        <tr>
                            <th>Completed</th>
                            <th>ID</th>
                            <th>Task Name</th>
                            <th>Task Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div>
                    <button type="button" class="btn btn-primary" onclick="openModal('<?php echo $_GET['id']; ?>')" data-toggle="modal" data-target="#myModalCreateNewTask">Add Task</button>
                </div>
            </div>
            <!-- now button to add a new project -->
        </div>
    </div>
</body>

<div id="myModalCreateNewTask" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Nova Task</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p>Modal body text goes here.</p>
                <!-- ID	Task Name	Task Description	Project ID	Completed	Created At Create form with this data -->
                <form action="./backend/createTask.php" method="post">
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
        </div>
    </div>
</div>

<div id="myModalCreateNewTask" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Nova Task</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p>Modal body text goes here.</p>
                <!-- ID	Task Name	Task Description	Project ID	Completed	Created At Create form with this data -->
                <form action="./backend/createTask.php" method="post">
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
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function openTaskEdit(button, task_id) {
        console.log('RODEI isaac e carol! botao de open project');

        var task_id = button.getAttribute("data-task-id");

        // Use the parameters in your logic
        console.log("Parameter 1: " + task_id);

        // Redirect to the openProject page with the project ID in the URL
        window.location.href = "./editarTask.php?task_id=" + task_id;
    }

    function openModal(projectId) {
        // Set the project ID in the form's projectId field
        document.getElementById('projectId').value = projectId;

        // Open the modal
        $('#myModalCreateNewTask').modal('show');
    }
</script>

</html>