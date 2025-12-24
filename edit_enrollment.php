<?php
include 'db.php';

// Validate ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id === 0) {
    die("Invalid Enrollment ID.");
}

// Fetch existing data
$result = $conn->query("SELECT * FROM enrollment WHERE Enrollment_ID = $id");
if (!$result || $result->num_rows === 0) {
    die("Enrollment not found.");
}
$row = $result->fetch_assoc();

// Handle update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['Student_ID'];
    $course_id = $_POST['Course_ID'];
    $enrollment_date = $_POST['Enrollment_Date'];
    $grade = $_POST['Grade'];

    $update = "UPDATE enrollment 
               SET Student_ID='$student_id', Course_ID='$course_id', Enrollment_Date='$enrollment_date', Grade='$grade' 
               WHERE Enrollment_ID=$id";

    if ($conn->query($update)) {
        header("Location: admin-enrollment.php");
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
  <title>Edit Enrollment</title>
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
  <h2>Edit Enrollment</h2>
  <form method="POST">
    <label>Student ID:</label>
    <input type="text" name="Student_ID" value="<?= htmlspecialchars($row['Student_ID']) ?>" required>

    <label>Course ID:</label>
    <input type="text" name="Course_ID" value="<?= htmlspecialchars($row['Course_ID']) ?>" required>

    <label>Enrollment Date:</label>
    <input type="date" name="Enrollment_Date" value="<?= htmlspecialchars($row['Enrollment_Date']) ?>" required>

    <label>Grade:</label>
    <input type="text" name="Grade" value="<?= htmlspecialchars($row['Grade']) ?>">

    <button type="submit">Update Enrollment</button>
  </form>

  <a href="admin-enrollment.php" class="back-link">← Back to Enrollments</a>
</div>

</body>
</html>
