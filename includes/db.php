<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'student_management_1';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
