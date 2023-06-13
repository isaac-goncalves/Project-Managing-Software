<?php
session_start();

    if (!isset($_SESSION['user']['username']))  {
        header('Location: index.php');
        exit();
    }
?>
