<?php
$host = "localhost";
$user = "root";         // Change if you have another MySQL username
$password = "";         // Change if your MySQL has a password
$database = "student-course-instructor";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
