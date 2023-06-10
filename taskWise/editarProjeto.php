<html>

<head>
    <?php require_once('navbar.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxx" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./editarProjeto.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Editar Projeto</title>
</head>

<body>
<div  class="container">
    <div class="card">
        <div class="card-body">
            <h1 id="projectName" class="card-header">Editar Projeto</h1>
            <form id="edit-project-form" action="./backend/editProject.php" method="post">
                <input type="hidden" name="project_id" id="edit-project-id" value="0">
                <div class="form-group">
                    <label for="edit-name">Name: </label>
                    <input type="text" class="form-control" name="name" id="edit-name" required>
                </div>
                <div class="form-group">
                    <label for="edit-description">Description: </label>
                    <textarea class="form-control" name="description" id="edit-description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="edit-start-date">Start Date:</label>
                    <input type="date" class="form-control" name="start_date" id="edit-start-date" required>
                </div>
                <div class="form-group">
                    <label for="edit-end-date">End Date:</label>
                    <input type="date" class="form-control" name="end_date" id="edit-end-date" required>
                </div>
                <div class="form-group">
                    <label for="edit-status">Status:</label>
                    <select class="form-control" name="status" id="edit-status" required>
                        <option value="open">Open</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-priority">Priority:</label>
                    <select class="form-control" name="priority" id="edit-priority" required>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-user-id">User ID:</label>
                    <input type="text" class="form-control" name="user_id" id="edit-user-id" readonly>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>   
</body>

</html>