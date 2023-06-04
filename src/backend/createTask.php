<?php
include './database/database.php';

// // Start the session
// session_start();

// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // Redirect to the login page or display an error message
//     header("Location: login.php?error=unauthorized");
//     exit();
// }


// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $project_id = $_POST['project_id'];
    $completed = $_POST['completed'];
    $created_at = $_POST['created_at'];

    // Call the function to insert data into the database
    insertToDatabase($task_name, $task_description, $project_id, $completed, $created_at);

    // Redirect to the index.php file or the desired page
    header("Location: ../index.php?message=Task created successfully!");
    exit();
}

function insertToDatabase($task_name, $task_description, $project_id, $completed, $created_at) {
    $pdo = getConnection();
    $sql = "INSERT INTO tasks (task_name, task_description, project_id, completed, created_at) VALUES (:task_name, :task_description, :project_id, :completed, :created_at)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'task_name' => $task_name,
        'task_description' => $task_description,
        'project_id' => $project_id,
        'completed' => $completed,
        'created_at' => $created_at
    ]);
}
?>