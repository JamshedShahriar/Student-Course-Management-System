<?php
require 'php/db.php'; // Include your DB connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Admin Panel - View Records</h1>
  </header>

  <main>
    <section>
      <h2>Students</h2>
      <table border="1">
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>DOB</th><th>Address</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Students");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
            <td>{$row['Student_ID']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Email']}</td>
            <td>{$row['Phone']}</td>
            <td>{$row['Date_of_Birth']}</td>
            <td>{$row['Address']}</td>
          </tr>";
        }
        ?>
      </table>
    </section>

    <section>
      <h2>Courses</h2>
      <table border="1">
        <tr><th>ID</th><th>Name</th><th>Credits</th><th>Department</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Courses");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
            <td>{$row['Course_ID']}</td>
            <td>{$row['Course_Name']}</td>
            <td>{$row['Credits']}</td>
            <td>{$row['Department']}</td>
          </tr>";
        }
        ?>
      </table>
    </section>

    <section>
      <h2>Instructors</h2>
      <table border="1">
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Department</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Instructors");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
            <td>{$row['Instructor_ID']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Email']}</td>
            <td>{$row['Phone']}</td>
            <td>{$row['Department']}</td>
          </tr>";
        }
        ?>
      </table>
    </section>

    <section>
      <h2>Enrollments</h2>
      <table border="1">
        <tr><th>ID</th><th>Student ID</th><th>Course ID</th><th>Date</th><th>Grade</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Enrollments");
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
    </section>

    <section>
      <h2>Course Instructors</h2>
      <table border="1">
        <tr><th>Course ID</th><th>Instructor ID</th><th>Assignment Date</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Course_Instructor");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
            <td>{$row['Course_ID']}</td>
            <td>{$row['Instructor_ID']}</td>
            <td>{$row['Assignment_Date']}</td>
          </tr>";
        }
        ?>
      </table>
    </section>
	
	<section>
  <h2>Course Instructors</h2>
  <table border="1">
    <tr><th>Course ID</th><th>Instructor ID</th><th>Assignment Date</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM Course_Instructor");
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
        <td>{$row['Course_ID']}</td>
        <td>{$row['Instructor_ID']}</td>
        <td>{$row['Assignment_Date']}</td>
      </tr>";
    }
    ?>
  </table>
</section>

	
  </main>
</body>
</html>
