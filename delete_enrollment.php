<?php
include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM enrollment WHERE Enrollment_ID = $id");

header("Location: admin-enrollment.php");
exit();