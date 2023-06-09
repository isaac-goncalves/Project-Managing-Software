<?php
// Fetch project data from the database
include './database/database.php';

$pdo = getConnection();

if (isset($_GET['project_id'])) {
    // Fetch a specific project by ID
    $projectId = $_GET['project_id'];

    $statement = $pdo->prepare("SELECT * FROM tasks WHERE project_id = :project_id");
    $statement->bindParam(':project_id', $projectId);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Return tasks data as JSON
    header('Content-Type: application/json');
    echo json_encode($tasks);
} 
if (isset($_GET['task_id'])) {
    // Fetch a specific project by ID
    $task_id = $_GET['task_id'];

    $statement = $pdo->prepare("SELECT * FROM tasks WHERE id = :task_id");
    $statement->bindParam(':task_id', $task_id);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Return tasks data as JSON
    header('Content-Type: application/json');
    echo json_encode($tasks);
} 
// else {
//     // Fetch all tasks
//     $statement = $pdo->query("SELECT * FROM tasks");
//     $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

//     // Return project data as JSON
//     header('Content-Type: application/json');
//     echo json_encode($tasks);
// }

