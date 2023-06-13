<?php
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    $id = $_SESSION['user']['id'];
    // Usuário logado, renderizar o conteúdo da página
} else {
    // Usuário não logado, redirecionar para a página de login
    header('Location: index.php');
    exit();
}
?>
