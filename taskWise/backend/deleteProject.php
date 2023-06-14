<?php

include './database/database.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Get the raw request body
     $requestBody = file_get_contents('php://input');

     // Decode the JSON data
     $requestData = json_decode($requestBody, true);
 
     // Get the project ID from the request data
     $projectId = $requestData['project_id'];
    // Call the function to delete data from the database
    $result = deleteDatabase($projectId);

    // Check the result and return appropriate response
    if ($result) {
        // Return a success message as JSON
        $response = ['status' => 'success', 'message' => 'Project deleted successfully'];
        header('Content-Type: application/json');
        echo json_encode($response);
        
    } else {
        // Return an error message as plain text
        header('Content-Type: text/plain');
        echo 'Failed to delete the project';
    }

    exit();
}

// Function to delete project data from the database
function deleteDatabase($projectId) {
    $pdo = getConnection();
    $sql = "DELETE FROM projetos WHERE id = :project_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'project_id' => $projectId
    ]);

    return $stmt->rowCount() > 0;
}
