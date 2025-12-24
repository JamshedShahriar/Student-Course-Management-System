<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Course Instructor Assignment</title>
  <link rel="stylesheet" href="../styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #003366;
      color: white;
      padding: 1rem 2rem;
    }

    h1, h2 {
      margin: 0;
    }

    nav {
      margin-top: 10px;
    }

    .home-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #0066cc;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .home-button:hover {
      background-color: #0055aa;
    }

    main {
      padding: 2rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #0066cc;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .action-links a {
      margin-right: 10px;
      text-decoration: none;
      color: #0066cc;
      font-weight: bold;
    }

    .action-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<header>
  <h1>Course Instructor Assignment</h1>
  <nav>
    <a href="../admin.php" class="home-button">Home</a>
  </nav>
</header>

<main>
  <h2>Course Instructor Assignment</h2>

  <table>
    <tr>
      <th>Course_ID</th>
      <th>Instructor_ID</th>
      <th>Assignment_Date</th>
      <th>Actions</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM course_instructor");

    while ($row = $result->fetch_assoc()) {
        $courseID = $row['Course_ID'];
        $instructorID = $row['Instructor_ID'];
        $assignmentDate = $row['Assignment_Date'];

        echo "<tr>
                <td>$courseID</td>
                <td>$instructorID</td>
                <td>$assignmentDate</td>               
                <td class='action-links'>
                  <a href='edit_course_instructor.php?course_id=$courseID&instructor_id=$instructorID'>Edit</a>
                  <a href='delete_course_instructor.php?course_id=$courseID&instructor_id=$instructorID' onclick=\"return confirm('Are you sure you want to delete this assignment?');\">Delete</a>
                </td>
              </tr>";
    }
    ?>
  </table>

</main>
</body>
</html>
