<?php
include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM instructor WHERE Instructor_ID = $id");

header("Location: admin-instructor.php");
exit();
