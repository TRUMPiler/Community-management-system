<?php
// Connection parameters
$host = "localhost";
$username = "root";
$password = ""; // Empty password
$dbname = "dbpassword"; // Database name
$port = 3306; // Port number, if different from default 3306

// Establish connection
$con = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
