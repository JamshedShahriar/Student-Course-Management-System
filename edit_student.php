<?php
include 'db.php';

// Validate and sanitize the ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    die("Invalid student ID.");
}

// Fetch student details
$result = $conn->query("SELECT * FROM student WHERE Student_ID = $id");
if (!$result || $result->num_rows == 0) {
    die("Student not found.");
}
$row = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['Email']);
    $phone = $conn->real_escape_string($_POST['Phone']);
    $dob = $conn->real_escape_string($_POST['Date_of_Birth']);
    $address = $conn->real_escape_string($_POST['Address']);

    $update = $conn->query("UPDATE student SET 
        Name = '$name', 
        Email = '$email', 
        Phone = '$phone', 
        Date_of_Birth = '$dob', 
        Address = '$address' 
        WHERE Student_ID = $id");

    if ($update) {
        header("Location: admin-student.php");

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
  <title>Edit Student</title>
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
    form input[type="email"],
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
  <h2>Edit Student</h2>
  <form method="POST">
    <label>Name:</label>
    <input type="text" name="Name" value="<?= htmlspecialchars($row['Name']) ?>" required>

    <label>Email:</label>
    <input type="email" name="Email" value="<?= htmlspecialchars($row['Email']) ?>" required>

    <label>Phone:</label>
    <input type="text" name="Phone" value="<?= htmlspecialchars($row['Phone']) ?>" required>

    <label>Date of Birth:</label>
    <input type="date" name="Date_of_Birth" value="<?= htmlspecialchars($row['Date_of_Birth']) ?>" required>

    <label>Address:</label>
    <input type="text" name="Address" value="<?= htmlspecialchars($row['Address']) ?>" required>

    <button type="submit">Update Student</button>
  </form>

  <a href="admin-student.php" class="back-link">← Back to Students</a>
</div>

</body>
</html>
