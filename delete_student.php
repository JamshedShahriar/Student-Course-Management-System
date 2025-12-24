<?php
include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM student WHERE Student_ID = $id");

header("Location: admin-student.php");
exit();
