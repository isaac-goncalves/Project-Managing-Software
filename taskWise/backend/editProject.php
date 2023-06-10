<?php

include './database/database.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the project ID from the request
    $projectId = $_POST['project_id'];

    // Retrieve other form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $userId = $_POST['user_id'];

    // Call the function to update data in the database
    updateDatabase($projectId, $name, $description, $startDate, $endDate, $status, $priority, $userId);

    // Redirect to the project list or a success page
    header("Location: ../projetos.php?message=Projeto editado com sucesso!");
    exit();
}

// Function to update project data in the database
function updateDatabase($projectId, $name, $description, $startDate, $endDate, $status, $priority, $userId) {
    $pdo = getConnection();
    $sql = "UPDATE projetos SET name = :name, description = :description, start_date = :start_date, end_date = :end_date, status = :status, priority = :priority, user_id = :user_id WHERE id = :project_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'project_id' => $projectId,
        'name' => $name,
        'description' => $description,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'status' => $status,
        'priority' => $priority,
        'user_id' => $userId
    ]);
}

?>