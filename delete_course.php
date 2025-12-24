<?php
include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM course WHERE Course_ID = $id");

header("Location: admin-course.php");
exit();
