<?php

function getConnection()
{
    // echo "Connecting to database...";
    $host = "localhost";
    $port = "5432";
    $database = "gerencimento-de-atividades";
    $user = "db_SYSMANAGER";
    $password = "2406";
    $dsn = "pgsql:host=$host;port=$port;dbname=$database;user=$user;password=$password";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
        $pdo = new PDO($dsn, $user, $password, $options);
        error_log('Connected to database');
        // echo "Connected successfully";
        return $pdo;
    } catch (PDOException $e) {
        error_log('Error on connecting to database');
        // echo "Connection failed: " . $e->getMessage();
    }
}
// getConnection();

?>