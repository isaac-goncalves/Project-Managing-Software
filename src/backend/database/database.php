
<!-- this file connects to the database POSTGRES -->


<?php

// here goes the variables to connect to the database

$dbhost = "localhost";
$dbuser = "postgres";
$dbpass = "2406";
$dbname = "ccpmClone";

// Connect to the PostgreSQL database
$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");


?>