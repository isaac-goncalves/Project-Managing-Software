<!-- this file connects to the database POSTGRES -->

<?php

function getConnection()
{
    echo "Connecting to database...";
    $host = "localhost";
    $port = "5432";
    $database = "ccpmClone";
    $user = "postgres";
    $password = "2406";
    $dsn = "pgsql:host=$host;port=$port;dbname=$database;user=$user;password=$password";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
        $pdo = new PDO($dsn, $user, $password, $options);
        echo "Connected successfully";
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// getConnection();

?>