<?php 

include '../database/database.php';

    //function to use connection to database to insert the new data into the database 
  function insertToDatabase($conn, $data, $valor) {
    $sql = "INSERT INTO dados (data, valor) VALUES ('$data', '$valor')";
    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
}

?>
