<?php
// Fetch project data from the database
include './database/database.php';

$pdo = getConnection();

if (isset($_GET['project_id'])) {
    // Fetch a specific project by ID
    $projectId = $_GET['project_id'];

    $statement = $pdo->prepare("SELECT * FROM projetos WHERE id = :id");
    $statement->bindParam(':id', $projectId);
    $statement->execute();

    $project = $statement->fetch(PDO::FETCH_ASSOC);

    // Return project data as JSON
    header('Content-Type: application/json');
    echo json_encode($project);
} else {
    // Fetch all projects
    $statement = $pdo->query("SELECT * FROM projetos");
    $projects = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Return project data as JSON
    header('Content-Type: application/json');
    echo json_encode($projects);
}
?>