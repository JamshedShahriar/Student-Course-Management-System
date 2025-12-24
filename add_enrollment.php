<?php
include 'db.php';

$studentId = $_POST['studentId'];
$courseId = $_POST['courseId'];
$date = $_POST['enrollmentDate'];
$grade = $_POST['grade'];

$sql = "INSERT INTO enrollment (Student_ID, Course_ID, Enrollment_Date, Grade)
        VALUES ('$studentId', '$courseId', '$date', '$grade')";

/*if ($conn->query($sql) === TRUE) {
    echo "Enrollment added!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>*/


if ($conn->query($sql) === TRUE) {
    echo '
<div class="message success">
  Enrollment added!
  <br><br>
  <a href="../admin.php" class="home-button">🏠 Back to Home</a>
</div>';

} else {
    echo "<div class='message error'>Error: " . $conn->error . "</div>";
}


    $conn->close();

?>

 <style>
.message {
  padding: 12px 20px;
  margin: 20px auto;
  width: 80%;
  border-radius: 8px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.success {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
}

.error {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}

</style>



<style>
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
</style>

