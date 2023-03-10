<?php

?>
<html>

<head>
    <title>CCPM - Clone</title>

</head>

<body>
   
    <?php require_once('header.php'); ?>

    <?php require_once('navbar.php'); ?>

    <h2>Insira um novo projeto</h2>

    <!-- Addo line break bewteen stuffs -->

    <form action="src\backend\insert.php" method="post">
        <label for="name">Nome do projeto</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="description">Descrição</label>
        <input type="text" name="description" id="description" required>
        <br>
        <label for="start_date">Data de início</label>
        <input type="date" name="start_date" id="start_date" required>
        <br>
        <label for="end_date">Data de término</label>
        <input type="date" name="end_date" id="end_date" required>
        <br>
        <label for="status">Status</label>

        <input type="text" name="status" id="status" required>
        <br>
        <label for="priority">Prioridade</label>
        <input type="text" name="priority" id="priority" required>
        <br>
        <label for="user_id">ID do usuário</label>
        <input type="text" name="user_id" id="user_id" required>
        <br>
        <br>
        <input type="submit" value="Enviar">
        
    </form>

    <?php if (isset($_GET['message'])): ?>
        <p>
            <?php echo $_GET['message']; ?>
        </p>
    <?php endif; ?>



</body>

</html>