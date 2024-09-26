<?php
$database_host = 'localhost';
$database_user = 'root';
$database_password = '';
$database_name = 'cat1';

// Create connection //

$conn = new mysqli($database_host, $database_user, $database_password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>