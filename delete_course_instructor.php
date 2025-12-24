<?php
include 'db.php';

// Validate and get the course_id and instructor_id from the query string
$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$instructor_id = isset($_GET['instructor_id']) ? (int)$_GET['instructor_id'] : 0;

if ($course_id === 0 || $instructor_id === 0) {
    die("Invalid Course or Instructor ID.");
}

// Prepare and execute delete query
$query = "DELETE FROM course_instructor WHERE Course_ID = ? AND Instructor_ID = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("ii", $course_id, $instructor_id);
    if ($stmt->execute()) {
        header("Location: admin-course_instructor.php");
        exit();
    } else {
        echo "Delete failed: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Query preparation failed: " . $conn->error;
}
?>
