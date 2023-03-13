<?php
include './database/database.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $user_id = $_POST['user_id'];

    // Call the function to insert data to the database
    insertToDatabase($name, $description, $start_date, $end_date, $status, $priority, $user_id);

    // Redirect to the index.php file
    header("Location: ../index.php?message=Projeto inserido com sucesso!");
    exit();
}

function insertToDatabase($name, $description, $start_date, $end_date, $status, $priority, $user_id) {
    $pdo = getConnection();
    $sql = "INSERT INTO projects (name, description, start_date, end_date, status, priority, user_id) VALUES (:name, :description, :start_date, :end_date, :status, :priority, :user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'description' => $description, 'start_date' => $start_date, 'end_date' => $end_date, 'status' => $status, 'priority' => $priority, 'user_id' => $user_id]);
}
?>
