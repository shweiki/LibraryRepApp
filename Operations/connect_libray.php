<?php

$servername = "localhost";
$username = "root";
$password = "";
$database="library";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
//echo "Connected successfully";
?>
