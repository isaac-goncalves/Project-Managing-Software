<?php require('session.php'); ?>
<html>
<head>
    <?php 
        require('navbar.php'); 
    ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Registrar Projeto</title>
    
</head>

<body>

    <div class="container mx-auto">
        <div class="card">
            <div class="card-body">
                <h1 class="card-header">Registrar novo projeto</h1>
                <form action="./backend/createProject.php" method="post">
                    <div class="form-group">
                        <label class="projLabel" for="name">Nome do projeto:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label class="projLabel" for="description">Descrição:</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                    <div class="form-group">
                        <label class="projLabel" for="start_date">Data de início:</label>
                        <input type="date" class="form-control" name="start_date" id="start_date" required>
                    </div>
                    <div class="form-group">
                        <label class="projLabel" for="end_date">Data de término:</label>
                        <input type="date" class="form-control" name="end_date" id="end_date" required>
                    </div>
                    <div class="form-group">
                        <label class="projLabel" for="status">Status:</label>
                        <select class="form-control" name="status" id="edit-status" required>
                            <option value="open">Em aberto</option>
                            <option value="in_progress">Em progresso</option>
                            <option value="completed">Finalizado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="projLabel" for="priority">Prioridade:</label>
                        <select class="form-control" name="priority" id="priority" required>
                            <option value="alto">Alto</option>
                            <option value="baixo">Baixo</option>
                            <option value="medio">Médio</option>
                            <option value="nao-se-aplica">Não se Aplica</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="projLabel" for="user_id">ID do usuário</label>
                        <input value="<?php echo $_SESSION['user']['id']; ?>" type="text" class="form-control" placeholder="Readonly input here…" name="user_id" id="user_id" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($_GET['message'])) : ?>
            <p>
                <?php echo $_GET['message']; ?>
            </p>
        <?php endif; ?>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>
</body>

</html>