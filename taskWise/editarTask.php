<html>

<head>
    <?php 
        require('navbar.php'); 
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxx" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./editarTask.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Editar task</title>
</head>

<body>
<div  class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="card-header">Editar task</h1>
            <form action="./backend/editTask.php" method="post">
                <div class="form-group">
                    <label for="task_id">ID task:</label>
                    <input type="text" class="form-control" id="task_id" name="task_id" readonly>
                </div>

                <div class="form-group">
                    <label for="projectId">ID projeto:</label>
                    <input type="text" class="form-control" id="projectId" name="project_id" required>
                </div>
                <div class="form-group">
                    <label for="taskName">Título:</label>
                    <input type="text" class="form-control" id="taskName" name="task_name" required>
                </div>
                <div class="form-group">
                    <label for="taskDescription">Descrição:</label>
                    <textarea class="form-control" id="taskDescription" name="task_description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="completed">Status:</label>
                    <select class="form-control" id="completed" name="completed" required>
                        <option value="true">Concluído</option>
                        <option value="false">Pendente</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="createdAt">Criado em:</label>
                    <input type="date" class="form-control" id="createdAt" name="created_at" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>



</html>