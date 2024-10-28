<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'preciousmemoriesapp';

// Create a connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to close the database connection
function closeConnection($conn) {
    $conn->close();
}
?>
