<?php
include 'db.php';

// Validate GET parameters
$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$instructor_id = isset($_GET['instructor_id']) ? (int)$_GET['instructor_id'] : 0;

if ($course_id === 0 || $instructor_id === 0) {
    die("Invalid Course or Instructor ID.");
}

// Fetch the existing record
$query = "SELECT * FROM course_instructor WHERE Course_ID = $course_id AND Instructor_ID = $instructor_id";
$result = $conn->query($query);

if (!$result || $result->num_rows === 0) {
    die("Record not found.");
}

$row = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_course_id = (int)$_POST['Course_ID'];
    $new_instructor_id = (int)$_POST['Instructor_ID'];
    $assignment_date = $_POST['Assignment_Date'];

    // Delete old record
    $delete_query = "DELETE FROM course_instructor WHERE Course_ID = $course_id AND Instructor_ID = $instructor_id";
    $conn->query($delete_query);

    // Insert updated record
    $insert_query = "INSERT INTO course_instructor (Course_ID, Instructor_ID, Assignment_Date)
                     VALUES ($new_course_id, $new_instructor_id, '$assignment_date')";

    if ($conn->query($insert_query)) {
        header("Location: admin-course_instructor.php");
        exit();
    } else {
        echo "Update failed: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Course Instructor</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #003366;
      margin-bottom: 30px;
    }

    form label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }

    form input[type="text"],
    form input[type="date"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }

    button {
      background-color: #0066cc;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      margin-top: 20px;
      width: 100%;
    }

    button:hover {
      background-color: #0055aa;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #0066cc;
      font-weight: bold;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Edit Course Instructor</h2>
  <form method="POST">
    <label>Course ID:</label>
    <input type="text" name="Course_ID" value="<?= htmlspecialchars($row['Course_ID']) ?>" required>

    <label>Instructor ID:</label>
    <input type="text" name="Instructor_ID" value="<?= htmlspecialchars($row['Instructor_ID']) ?>" required>

    <label>Assignment Date:</label>
    <input type="date" name="Assignment_Date" value="<?= htmlspecialchars($row['Assignment_Date']) ?>" required>

    <button type="submit">Update Course Instructor</button>
  </form>

  <a href="admin-course_instructors.php" class="back-link">← Back to Course Instructors</a>
</div>

</body>
</html>
