<!-- <?php phpinfo(); ?> -->
<?php
?>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
<link rel="stylesheet" href="styles/addProjectStyles.css">

<head>
    <title>CCPM - Clone</title>

</head>

<body>

    <?php require_once('header.php'); ?>

    <?php require_once('navbar.php'); ?>
    <div class="loginWrapper">
        <h1>Insira um novo projeto</h1>
        <!-- Addo line break bewteen stuffs -->
        <form action="../src/backend/createProject.php" method="post">
            <label class="projLabel" for="name">Nome do projeto</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label class="projLabel" for="description">Descrição</label>
            <input type="text" name="description" id="description" required>
            <br>
            <label class="projLabel" for="start_date">Data de início</label>
            <input type="date" name="start_date" id="start_date" required>
            <br>
            <label class="projLabel" for="end_date">Data de término</label>
            <input type="date" name="end_date" id="end_date" required>
            <br>
            <label class="projLabel" for="status">Status</label>
            <input type="text" name="status" id="status" required>
            <br>
            <label class="projLabel" for="priority">Prioridade</label>
            <select name="priority" id="priority" required>
                <option value="alto">Alto</option>
                <option value="baixo">Baixo</option>
                <option value="medio">Médio</option>
                <option value="nao-se-aplica">Não se Aplica</option>
            </select>
            <br>
            <label class="projLabel" for="user_id">ID do usuário</label>
            <input type="text" name="user_id" id="user_id" required>
            <br>
            <br>
            <Button type="submit" value="Enviar"> Enviar </Button>
        </form>
    </div>

    <?php if (isset($_GET['message'])) : ?>
        <p>
            <?php echo $_GET['message']; ?>
        </p>
    <?php endif; ?>



</body>

</html>