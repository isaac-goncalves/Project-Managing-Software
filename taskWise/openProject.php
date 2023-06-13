<?php
require('session.php');
?>

<html>

<head>
<title>Detalhar projeto</title>

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
    <?php

    // if (isset($_GET['message'])) {
    //     if ($_GET['message'] == "succes") {
    //         echo '<div class="alert alert-success">$decryptedMessage</div>';
    //     }
    // }

    if (isset($_GET['message'])) {
        $decryptedMessage = urldecode($_GET['message']);
        echo '<div class="alert alert-success">' . $decryptedMessage . '</div>';
    }

    ?>
    <div class="container mx-auto">
        <div class="card">
            <h1 id="projectName" class="card-header">Projeto: Loading...</h1>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-info font-weight-bold" for="description">Description:</label>
                                <span id="description">Loading...</span>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-primary font-weight-bold" for="startDate">Start Date:</label>
                                <span id="startDate">Loading...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-danger font-weight-bold" for="endDate">End Date: </label>
                                <span id="endDate">Loading...</span>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-warning font-weight-bold" for="priority">Prioridade: </label>
                                <span id="priority">Loading...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-success font-weight-bold" for="status">Status: </label>
                                <span id="status">Loading...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-success font-weight-bold" for="status">Criador: </label>
                                <span id="nome_criador">Loading...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-success font-weight-bold" for="status">Id: </label>
                                <span id="id_criador">Loading...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label label-success font-weight-bold" for="status">Email: </label>
                                <span id="email_criador">Loading...</span>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="openModal('<?php echo $_GET['id']; ?>')" data-toggle="modal" data-target="#myModalCreateNewTask">Add Task</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='./projetos.php'">Voltar</button>
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
                <!-- ID	Task Name	Task Description	Project ID	Completed	Created At Create form with this data -->
                <form action="./backend/createTask.php" method="post">
                    <div class="form-group">
                        <label for="projectId">Project ID</label>
                        <input type="text" class="form-control" id="projectId" name="project_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="taskName">Task Name</label>
                        <input type="text" class="form-control" id="taskName" name="task_name">
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