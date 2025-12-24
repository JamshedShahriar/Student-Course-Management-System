<?php
// Database connection
include 'php/db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enrollments</title>
  <link rel="stylesheet" href="styles.css">
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
  </style>
</head>
<body>

<header>
  <h1>Enrollments</h1>
  <nav>
    <a href="index.php" class="home-button">Home</a>
  </nav>
</header>

<main>
  <h2>Enrollment List</h2>

    <table>
      <tr>
        <th>Enrollment_ID</th>
        <th>Student_ID</th>
        <th>Course Name</th>
        <th>Enrollment_Date</th>
        <th>Grade</th>
      </tr>
      <?php
  $result = $conn->query("SELECT * FROM enrollment");
  while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['Enrollment_ID']}</td>
              <td>{$row['Student_ID']}</td>
              <td>{$row['Course_ID']}</td>
              <td>{$row['Enrollment_Date']}</td>
              <td>{$row['Grade']}</td>
              
            </tr>";
  }
  ?>
    </table>

</main>
</body>
</html>