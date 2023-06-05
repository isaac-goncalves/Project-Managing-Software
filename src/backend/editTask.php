<?php
include './database/database.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the task ID from the request
    $taskId = $_POST['task_id'];

    // Retrieve other form data
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];
    $completed = $_POST['completed'];
    $createdAt = $_POST['created_at'];

    // Call the function to update data in the database
    updateDatabase($taskId, $taskName, $taskDescription, $completed, $createdAt);

    // Redirect to the task list or a success page
    header("Location: ../tasks.php");
    exit();
}

// Function to update task data in the database
function updateDatabase($taskId, $taskName, $taskDescription, $completed, $createdAt)
{
    $pdo = getConnection();
    $sql = "UPDATE tasks SET task_name = :task_name, task_description = :task_description, completed = :completed, created_at = :created_at WHERE id = :task_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'task_id' => $taskId,
        'task_name' => $taskName,
        'task_description' => $taskDescription,
        'completed' => $completed,
        'created_at' => $createdAt
    ]);
}
