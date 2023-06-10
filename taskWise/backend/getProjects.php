<?php
// Fetch project data from the database
include './database/database.php';

$pdo = getConnection();

if (isset($_GET['project_id'])) {
    // Fetch a specific project by ID
    $projectId = $_GET['project_id'];

    $statement = $pdo->prepare("SELECT projetos.*, users.username AS nome_criador, users.email AS email_criador
                            FROM projetos
                            INNER JOIN users ON projetos.user_id = users.id
                            WHERE projetos.id = :id");
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
