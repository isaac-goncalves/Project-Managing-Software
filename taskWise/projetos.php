
<html>

<head>
    <style>
        .table .btn {
            margin-right: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <script type="text/javascript" src="./projetos.js"></script>
    <!-- <link rel="stylesheet" href="styles/tasks.css"> -->

    <script>
        // $(document).ready(function() {
        //     $('#myModal').modal();
        // });
    </script>

</head>

<body>
    <div class="container mx-auto">
        <div class="card">
            <?php require_once('navbar.php'); ?>
            <h1 class="card-header">Projetos</h1>
            <div class="card-body">

                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Open Modal
    </button> -->
                <table class="table table-hover" id="projectTable">
                    <thead>
                        <tr>
                            <th>Project Name</th>
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
                <div>
                    <button class='btn btn-primary' type="submit" name="logout-submit" onclick="window.location.href='./registrarProjeto.php'">Add project</button>
                </div>
            </div>
            <!-- now button to add a new project -->
        </div>
    </div>
</body>


<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h3 class="modal-title">Project Details</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <p>Modal body text goes here.</p>
                        <p>Modal body text goes here.</p>
                        <p>Modal body text goes here.</p>
                        <p>Modal body text goes here.</p>
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-header text-right">Tasks</h5>
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Task Name</th>
                                            <th>Task Description</th>
                                            <th>Project ID</th>
                                            <th>Completed</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="max-height: 200px; overflow-y: auto;">
                                        <tr>
                                            <td class="small-cell">teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEdit">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEdit">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEdit">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEdit">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>teste</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEdit">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalCreateNewTask">Add Task</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModalCreateNewTask" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Nova Task</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body ">
                    <p>Modal body text goes here.</p>
                    <!-- 
ID	Task Name	Task Description	Project ID	Completed	Created At Create form with this data -->
                    <form>
                        <div class="form-group">
                            <label for="taskId">ID</label>
                            <input type="text" class="form-control" id="taskId" name="taskId" required>
                        </div>
                        <div class="form-group">
                            <label for="taskName">Task Name</label>
                            <input type="text" class="form-control" id="taskName" name="taskName" required>
                        </div>
                        <div class="form-group">
                            <label for="taskDescription">Task Description</label>
                            <textarea class="form-control" id="taskDescription" name="taskDescription" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="projectId">Project ID</label>
                            <input type="text" class="form-control" id="projectId" name="projectId" required>
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
                            <input type="date" class="form-control" id="createdAt" name="createdAt" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function openProject(button, projectId) {
            console.log('RODEI isaac e carol! botao de open project');
            var projectId = button.getAttribute("data-project-id");

            // Use the parameters in your logic
            console.log("Parameter 1: " + projectId);

            // Redirect to the openProject page with the project ID in the URL
            window.location.href = "/src/openProject.php?id=" + projectId;
        }
    </script>

</html>