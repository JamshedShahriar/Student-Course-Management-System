<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM course WHERE Course_ID = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Course_Name'];
    $credits = $_POST['Credits'];
    $department = $_POST['Department'];

    $conn->query("UPDATE course SET Course_Name='$name', Credits='$credits', Department='$department' WHERE Course_ID=$id");
    header("Location: admin-course.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Course</title>
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
    form input[type="number"] {
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
  <h2>Edit Course</h2>
  <form method="POST">
    <label>Course Name:</label>
    <input type="text" name="Course_Name" value="<?= $row['Course_Name'] ?>" required>

    <label>Credits:</label>
    <input type="number" name="Credits" value="<?= $row['Credits'] ?>" required>

    <label>Department:</label>
    <input type="text" name="Department" value="<?= $row['Department'] ?>" required>

    <button type="submit">Update Course</button>
  </form>

  <a href="courses.php" class="back-link">← Back to Courses</a>
</div>

</body>
</html>
